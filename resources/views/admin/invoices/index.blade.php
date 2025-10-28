<x-layout>
    <x-slot:heading>
        All Invoices
    </x-slot:heading>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Invoice Management</h2>
        </div>

        @if($invoices->count() > 0)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Invoice #</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Room</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payments</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($invoices as $invoice)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $invoice->invoice_number }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $invoice->reservation->user->first_name }} {{ $invoice->reservation->user->last_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $invoice->reservation->room->number }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    ${{ number_format($invoice->final_amount, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $invoice->status === 'paid' ? 'bg-green-100 text-green-800' : 
                                           ($invoice->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($invoice->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $invoice->payments->count() }} payment(s)
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.invoices.show', $invoice) }}" 
                                       class="text-indigo-600 hover:text-indigo-900">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $invoices->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">No invoices found</p>
            </div>
        @endif
    </div>
</x-layout>
