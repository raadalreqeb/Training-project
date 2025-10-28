<x-layout>
    <x-slot:heading>
        Payment for Invoice {{ $invoice->invoice_number }}
    </x-slot:heading>

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Invoice Summary</h3>
                <div class="bg-gray-50 p-4 rounded-md">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Invoice #:</span>
                        <span class="font-medium">{{ $invoice->invoice_number }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Amount:</span>
                        <span class="font-bold text-lg">${{ number_format($invoice->final_amount, 2) }}</span>
                    </div>
                </div>
            </div>

            <form action="{{ route('payments.store', $invoice) }}" method="POST">
                @csrf
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Select Payment Method</label>
                    
                    <div class="space-y-3">
                        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment_method" value="cash" class="mr-3" required>
                            <div>
                                <p class="font-medium">Cash</p>
                                <p class="text-sm text-gray-500">Pay at hotel reception</p>
                            </div>
                        </label>

                        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment_method" value="visa" class="mr-3" required>
                            <div>
                                <p class="font-medium">Credit/Debit Card</p>
                                <p class="text-sm text-gray-500">Pay securely with your card</p>
                            </div>
                        </label>

                        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment_method" value="online" class="mr-3" required>
                            <div>
                                <p class="font-medium">Online Payment</p>
                                <p class="text-sm text-gray-500">PayPal, Stripe, etc.</p>
                            </div>
                        </label>
                    </div>
                    @error('payment_method')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Amount</label>
                    <input type="number" 
                           name="amount" 
                           id="amount" 
                           step="0.01" 
                           value="{{ $invoice->final_amount }}"
                           max="{{ $invoice->final_amount }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                           required>
                    @error('amount')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes (Optional)</label>
                    <textarea name="notes" 
                              id="notes" 
                              rows="3" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit" 
                            class="flex-1 bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 font-medium">
                        Continue to Payment
                    </button>
                    <a href="{{ route('invoices.show', $invoice) }}" 
                       class="flex-1 bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300 font-medium text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
