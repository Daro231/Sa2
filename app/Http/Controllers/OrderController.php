<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Show checkout page with cart items
     */
    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        // Check stock availability
        foreach ($cartItems as $item) {
            if ($item->quantity > $item->product->stock) {
                return redirect()->route('cart.index')->with('error', 
                    "Sorry, only {$item->product->stock} units of {$item->product->name} are available."
                );
            }
        }

        $subtotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        $shipping = 10.00; // Fixed shipping cost
        $tax = $subtotal * 0.10; // 10% tax
        $total = $subtotal + $shipping + $tax;

        // Get user's saved addresses if any
        $user = Auth::user();

        return view('orders.checkout', compact('cartItems', 'subtotal', 'shipping', 'tax', 'total', 'user'));
    }

    /**
     * Store order and redirect to payment
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'street_address' => 'required|string|max:255',
            'street_address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'phone_number' => 'required|string|max:20',
            'payment_method' => 'required|in:acleda,credit_card,paypal',
            'notes' => 'nullable|string|max:500'
        ]);

        $cartItems = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        // Calculate totals
        $subtotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        $shipping = 10.00;
        $tax = $subtotal * 0.10;
        $total = $subtotal + $shipping + $tax;

        // Begin transaction
        DB::beginTransaction();

        try {
            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'ORD-' . strtoupper(Str::random(10)),
                'full_name' => $request->full_name,
                'email' => $request->email,
                'street_address' => $request->street_address,
                'street_address2' => $request->street_address2,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'phone_number' => $request->phone_number,
                'payment_method' => $request->payment_method,
                'notes' => $request->notes,
                'subtotal' => $subtotal,
                'shipping' => $shipping,
                'tax' => $tax,
                'total_amount' => $total,
                'status' => 'pending',
                'payment_status' => 'pending'
            ]);

            // Create order items and update stock
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->product->price * $item->quantity
                ]);

                // Update product stock
                $product = Product::find($item->product_id);
                $product->stock -= $item->quantity;
                $product->save();
            }

            // Clear the cart
            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            // Redirect to payment page
            return redirect()->route('checkout.payment', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }

    /**
     * Show payment page
     */
    public function payment($id)
    {
        $order = Order::with('items')->findOrFail($id);

        // Check if order belongs to authenticated user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Generate QR code data
        $qrData = json_encode([
            'order_number' => $order->order_number,
            'amount' => $order->total_amount,
            'currency' => 'USD',
            'timestamp' => now()->timestamp
        ]);

        return view('orders.payment', compact('order', 'qrData'));
    }

    /**
     * Process payment (simulate payment processing)
     */
    public function processPayment(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Check if order belongs to authenticated user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Simulate payment processing
        // In real application, you would integrate with payment gateway here
        
        // Update order status
        $order->payment_status = 'completed';
        $order->status = 'processing';
        $order->paid_at = now();
        $order->save();

        // Send order confirmation email (optional)
        // Mail::to($order->email)->send(new OrderConfirmation($order));

        return redirect()->route('checkout.receipt', $order->id)
            ->with('success', 'Payment successful! Your order has been placed.');
    }

    /**
     * Show order receipt
     */
    public function receipt($id)
    {
        $order = Order::with('items')->findOrFail($id);

        // Check if order belongs to authenticated user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('orders.receipt', compact('order'));
    }

    /**
     * Show order history
     */
    public function history()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('items')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('orders.history', compact('orders'));
    }

    /**
     * Cancel order (if pending)
     */
    public function cancel($id)
    {
        $order = Order::findOrFail($id);

        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status === 'pending') {
            $order->status = 'cancelled';
            $order->save();

            // Restore stock
            foreach ($order->items as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->stock += $item->quantity;
                    $product->save();
                }
            }

            return redirect()->route('orders.history')->with('success', 'Order cancelled successfully.');
        }

        return redirect()->route('orders.history')->with('error', 'This order cannot be cancelled.');
    }
}