<x-layout>
    <x-slot:heading>
        Invoice Details - {{ $invoice->invoice_number }}
    </x-slot:heading>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b">
                        <div class="flex justify-between items-center">
                            <h2 class="text-2xl font-bold text-gray-800">{{ $invoice->invoice_number }}</h2>
                            <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                {{ $invoice->status === 'paid' ? 'bg-green-100 text-green-800' : 
                                   ($invoice->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($invoice->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="px-6 py-4">
                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Customer</h3>
                                <p class="mt-1 text-lg text-gray-900">{{ $invoice->reservation->user->first_name }} {{ $invoice->reservation->user->last_name }}</p>
                                <p class="text-sm text-gray-600">{{ $invoice->reservation->user->email }}</p>
                                <p class="text-sm text-gray-600">{{ $invoice->reservation->user->phone }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Reservation</h3>
                                <p class="mt-1 text-lg text-gray-900">Room {{ $invoice->reservation->room->number }}</p>
                                <p class="text-sm text-gray-600">{{ $invoice->reservation->start_date->format('M d') }} - {{ $invoice->reservation->end_date->format('M d, Y') }}</p>
                                <p class="text-sm text-gray-600">Status: {{ ucfirst($invoice->reservation->status) }}</p>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Invoice Details</h3>
                            <dl class="space-y-2">
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Subtotal</dt>
                                    <dd class="text-gray-900 font-medium">${{ number_format($invoice->total_amount, 2) }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Tax (16%)</dt>
                                    <dd class="text-gray-900 font-medium">${{ number_format($invoice->tax_amount, 2) }}</dd>
                                </div>
                                @if($invoice->discount > 0)
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Discount</dt>
                                    <dd class="text-red-600 font-medium">-${{ number_format($invoice->discount, 2) }}</dd>
                                </div>
                                @endif
                                <div class="flex justify-between border-t border-gray-200 pt-2">
                                    <dt class="text-lg font-bold text-gray-900">Total</dt>
                                    <dd class="text-lg font-bold text-gray-900">${{ number_format($invoice->final_amount, 2) }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>

                @if($invoice->payments->count() > 0)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden mt-6">
                    <div class="px-6 py-4 bg-gray-50 border-b">
                        <h3 class="text-lg font-medium text-gray-900">Payment History</h3>
                    </div>
                    <div class="px-6 py-4">
                        <div class="space-y-3">
                            @foreach($invoice->payments as $payment)
                            <div class="flex justify-between items-center bg-gray-50 p-4 rounded">
                                <div>
                                    <p class="font-medium text-gray-900">
                                        {{ ucfirst($payment->payment_method) }} - ${{ number_format($payment->amount, 2) }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        @if($payment->paid_at)
                                            {{ $payment->paid_at->format('M d, Y H:i') }}
                                        @else
                                            Pending
                                        @endif
                                    </p>
                                    @if($payment->transaction_id)
                                        <p class="text-xs text-gray-400">TXN: {{ $payment->transaction_id }}</p>
                                    @endif
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                        {{ $payment->payment_status === 'completed' ? 'bg-green-100 text-green-800' : 
                                           ($payment->payment_status === 'failed' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($payment->payment_status) }}
                                    </span>
                                    @if($payment->payment_status === 'pending' && $payment->payment_method === 'cash')
                                    <form action="{{ route('admin.payments.confirm', $payment) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-xs bg-green-600 text-white px-2 py-1 rounded hover:bg-green-700">
                                            Confirm
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div class="space-y-4">
                @if($invoice->status !== 'cancelled')
                <div class="bg-white shadow rounded-lg p-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Apply Discount</h3>
                    <form action="{{ route('admin.invoices.discount', $invoice) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Discount Amount</label>
                            <input type="number" 
                                   name="discount" 
                                   step="0.01" 
                                   max="{{ $invoice->total_amount }}"
                                   value="{{ $invoice->discount }}"
                                   class="w-full px-3 py-2 border rounded-md">
                        </div>
                        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">
                            Apply Discount
                        </button>
                    </form>
                </div>

                <div class="bg-white shadow rounded-lg p-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Actions</h3>
                    <div class="space-y-2">
                        @if($invoice->status !== 'cancelled')
                        <form action="{{ route('admin.invoices.cancel', $invoice) }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    onclick="return confirm('Are you sure you want to cancel this invoice?')"
                                    class="w-full bg-red-600 text-white py-2 rounded-md hover:bg-red-700">
                                Cancel Invoice
                            </button>
                        </form>
                        @endif
                        <a href="{{ route('admin.invoices.index') }}" 
                           class="block w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300 text-center">
                            Back to Invoices
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
