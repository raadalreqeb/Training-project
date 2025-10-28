<x-layout>
    <x-slot:heading>
        Invoice {{ $invoice->invoice_number }}
    </x-slot:heading>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
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
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Reservation</h3>
                        <p class="mt-1 text-lg text-gray-900">Room {{ $invoice->reservation->room->number }}</p>
                        <p class="text-sm text-gray-600">{{ $invoice->reservation->start_date->format('M d') }} - {{ $invoice->reservation->end_date->format('M d, Y') }}</p>
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

                @if($invoice->payments->count() > 0)
                <div class="border-t border-gray-200 pt-4 mt-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Payment History</h3>
                    <div class="space-y-2">
                        @foreach($invoice->payments as $payment)
                        <div class="flex justify-between items-center bg-gray-50 p-3 rounded">
                            <div>
                                <p class="text-sm font-medium text-gray-900">
                                    {{ ucfirst($payment->payment_method) }} - ${{ number_format($payment->amount, 2) }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    @if($payment->paid_at)
                                        {{ $payment->paid_at->format('M d, Y H:i') }}
                                    @else
                                        Pending
                                    @endif
                                </p>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                {{ $payment->payment_status === 'completed' ? 'bg-green-100 text-green-800' : 
                                   ($payment->payment_status === 'failed' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($payment->payment_status) }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($invoice->status !== 'paid' && $invoice->status !== 'cancelled')
                <div class="mt-6">
                    <a href="{{ route('payments.create', $invoice) }}" 
                       class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Pay Now
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
