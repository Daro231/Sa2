@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="max-w-md mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-8 text-center">
                <i class="fas fa-credit-card text-white text-5xl mb-4"></i>
                <h1 class="text-2xl font-bold text-white">Complete Payment</h1>
                <p class="text-blue-100 mt-2">Order #{{ $order->order_number }}</p>
            </div>

            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 m-6" role="alert">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <!-- Payment Details -->
            <div class="p-6">
                <!-- Amount -->
                <div class="text-center mb-8">
                    <p class="text-gray-600 mb-2">Total Amount</p>
                    <p class="text-4xl font-bold text-gray-900">${{ number_format($order->total_amount, 2) }}</p>
                </div>

                <!-- Payment Method Specific Content -->
                @if($order->payment_method == 'acleda')
                    <div class="text-center">
                        <div class="bg-gray-50 p-6 rounded-xl mb-6">
                            <p class="text-gray-700 mb-4">Scan QR code with ACLEDA mobile app to pay</p>
                            
                            <!-- QR Code -->
                            <div class="bg-white p-4 rounded-xl shadow-inner mb-4">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode($qrData) }}" 
                                     alt="Payment QR Code" 
                                     class="w-48 h-48 mx-auto">
                            </div>
                            
                            <div class="text-sm text-gray-600">
                                <p class="mb-1"><span class="font-medium">Account:</span> ACLEDA Bank Plc.</p>
                                <p class="mb-1"><span class="font-medium">Account Name:</span> Your Store Name</p>
                                <p><span class="font-medium">Account Number:</span> 123-456-789</p>
                            </div>
                        </div>

                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                            <div class="flex items-start">
                                <i class="fas fa-info-circle text-yellow-600 mt-1 mr-3"></i>
                                <div class="text-sm text-yellow-700 text-left">
                                    <p class="font-medium mb-1">Payment Instructions:</p>
                                    <ol class="list-decimal list-inside space-y-1">
                                        <li>Open ACLEDA mobile app</li>
                                        <li>Scan the QR code above</li>
                                        <li>Verify the amount: ${{ number_format($order->total_amount, 2) }}</li>
                                        <li>Complete the payment</li>
                                        <li>Click "I've Completed Payment" below</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif($order->payment_method == 'credit_card')
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Card Number</label>
                            <div class="relative">
                                <input type="text" placeholder="1234 5678 9012 3456" 
                                       class="w-full border rounded-lg px-4 py-2 pl-10 focus:ring-2 focus:ring-blue-500">
                                <i class="fas fa-credit-card absolute left-3 top-3 text-gray-400"></i>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Expiry Date</label>
                                <input type="text" placeholder="MM/YY" 
                                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
                                <input type="text" placeholder="123" 
                                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Cardholder Name</label>
                            <input type="text" placeholder="John Doe" 
                                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                @elseif($order->payment_method == 'paypal')
                    <div class="text-center py-8">
                        <i class="fab fa-paypal text-6xl text-blue-600 mb-4"></i>
                        <p class="text-gray-600 mb-6">You will be redirected to PayPal to complete your payment securely.</p>
                        <button class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                            <i class="fab fa-paypal mr-2"></i> Pay with PayPal
                        </button>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <form action="{{ route('checkout.process-payment', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" 
                                class="w-full bg-green-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-green-700 transition duration-200 flex items-center justify-center space-x-2">
                            <span>I've Completed Payment</span>
                            <i class="fas fa-check"></i>
                        </button>
                    </form>

                    <a href="{{ route('orders.history') }}" 
                       class="w-full bg-gray-100 text-gray-700 font-semibold py-3 px-6 rounded-lg hover:bg-gray-200 transition duration-200 flex items-center justify-center space-x-2">
                        <i class="fas fa-times"></i>
                        <span>Cancel Payment</span>
                    </a>
                </div>

                <!-- Payment Timer (Optional) -->
                <div class="mt-6 text-center">
                    <div class="inline-flex items-center px-4 py-2 bg-gray-100 rounded-full">
                        <i class="far fa-clock text-gray-600 mr-2"></i>
                        <span class="text-sm text-gray-600">Payment expires in: <span class="font-medium text-blue-600" id="timer">15:00</span></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Support -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                Having trouble? <a href="#" class="text-blue-600 hover:underline">Contact Support</a>
            </p>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Countdown timer
function startTimer(duration, display) {
    let timer = duration, minutes, seconds;
    const interval = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            clearInterval(interval);
            display.textContent = "EXPIRED";
            display.classList.add('text-red-600');
            
            // Optionally redirect or show message
            document.querySelector('form button[type="submit"]').disabled = true;
            document.querySelector('form button[type="submit"]').classList.add('opacity-50', 'cursor-not-allowed');
        }
    }, 1000);
}

window.onload = function () {
    const display = document.querySelector('#timer');
    if (display) {
        // 15 minutes in seconds
        startTimer(900, display);
    }
};
</script>
@endpush
@endsection