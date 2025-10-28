<x-layout>
    <x-slot:heading>
        Processing Payment
    </x-slot:heading>

    <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-md rounded-lg p-8">
            <div class="text-center mb-6">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 mb-4">
                    <svg class="animate-spin h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Processing your payment...</h3>
                <p class="text-sm text-gray-500 mt-2">Please wait while we process your {{ ucfirst($payment->payment_method) }} payment</p>
            </div>

            <div class="bg-gray-50 p-4 rounded-md mb-6">
                <div class="flex justify-between mb-2">
                    <span class="text-sm text-gray-600">Amount:</span>
                    <span class="text-sm font-medium">${{ number_format($payment->amount, 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm text-gray-600">Payment Method:</span>
                    <span class="text-sm font-medium">{{ ucfirst($payment->payment_method) }}</span>
                </div>
            </div>

            <div class="space-y-3">
                <a href="{{ route('payments.success', $payment) }}" 
                   class="block w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 font-medium text-center">
                    Simulate Success
                </a>
                <a href="{{ route('payments.failed', $payment) }}" 
                   class="block w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 font-medium text-center">
                    Simulate Failure
                </a>
            </div>

            <p class="text-xs text-gray-500 text-center mt-4">
                Note: This is a demo. In production, this would integrate with a real payment gateway.
            </p>
        </div>
    </div>
</x-layout>
