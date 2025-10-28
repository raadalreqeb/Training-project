<x-layout>
    <x-slot:heading>
        Payment Successful
    </x-slot:heading>

    <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-md rounded-lg p-8 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <h3 class="text-lg font-medium text-gray-900 mb-2">Payment Successful!</h3>
            <p class="text-sm text-gray-500 mb-6">Your payment has been processed successfully.</p>

            <div class="bg-gray-50 p-4 rounded-md mb-6 text-left">
                <div class="flex justify-between mb-2">
                    <span class="text-sm text-gray-600">Transaction ID:</span>
                    <span class="text-sm font-medium">{{ $payment->transaction_id }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="text-sm text-gray-600">Amount Paid:</span>
                    <span class="text-sm font-medium">${{ number_format($payment->amount, 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm text-gray-600">Payment Method:</span>
                    <span class="text-sm font-medium">{{ ucfirst($payment->payment_method) }}</span>
                </div>
            </div>

            <div class="space-y-3">
                <a href="{{ route('invoices.show', $payment->invoice) }}" 
                   class="block w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 font-medium">
                    View Invoice
                </a>
                <a href="{{ route('reservations.index') }}" 
                   class="block w-full bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300 font-medium">
                    My Reservations
                </a>
            </div>
        </div>
    </div>
</x-layout>
