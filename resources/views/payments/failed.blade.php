<x-layout>
    <x-slot:heading>
        Payment Failed
    </x-slot:heading>

    <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-md rounded-lg p-8 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>

            <h3 class="text-lg font-medium text-gray-900 mb-2">Payment Failed</h3>
            <p class="text-sm text-gray-500 mb-6">Unfortunately, your payment could not be processed. Please try again.</p>

            <div class="space-y-3">
                <a href="{{ route('payments.create', $payment->invoice) }}" 
                   class="block w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 font-medium">
                    Try Again
                </a>
                <a href="{{ route('invoices.show', $payment->invoice) }}" 
                   class="block w-full bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300 font-medium">
                    Back to Invoice
                </a>
            </div>
        </div>
    </div>
</x-layout>
