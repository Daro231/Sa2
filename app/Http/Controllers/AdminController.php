<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Admin dashboard summary (Unified View)
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        $users = User::orderBy('created_at', 'desc')->get();
        
        return view('admin.dashboard', compact('products', 'orders', 'users'));
    }

    /**
     * List all products for management
     */
    public function products()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show form to create a new product
     */
    public function createProduct()
    {
        return view('admin.products.create');
    }

    /**
     * Store a new product
     */
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'nullable|string|max:100',
            'image_url' => 'nullable|string|max:255', // Or handle file upload if needed
        ]);

        Product::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Product created successfully.');
    }

    /**
     * Show form to edit an existing product
     */
    public function editProduct(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update product information
     */
    public function updateProduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'nullable|string|max:100',
            'image_url' => 'nullable|string|max:255',
        ]);

        $product->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Product updated successfully.');
    }

    /**
     * Delete a product
     */
    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Product deleted successfully.');
    }

    /**
     * User management methods
     */
    public function updateUserRole(Request $request, User $user)
    {
        $request->validate([
            'isAdmin' => 'required|boolean',
        ]);

        $user->isAdmin = $request->isAdmin;
        $user->save();

        return back()->with('success', 'User role updated successfully.');
    }

    public function deleteUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $user->delete();
        return back()->with('success', 'User removed successfully.');
    }

    /**
     * View all orders (processes)
     */
    public function orders()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Update order status
     */
    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|in:pending,processing,completed,cancelled,refunded',
        ]);

        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Order status updated successfully.');
    }
}
