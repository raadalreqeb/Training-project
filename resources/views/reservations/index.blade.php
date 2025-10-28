<x-layout>
    <x-slot name="heading">My Reservations</x-slot>

    <div class="px-4">
        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 text-green-700 px-5 py-4 rounded-lg flex items-start">
                <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($reservations->count())
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Room</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Check-in</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Check-out</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Payment</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Total Price</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($reservations as $reservation)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-semibold text-gray-800">{{ $reservation->room->type ?? 'N/A' }}</div>
                                        <div class="text-sm text-gray-500">Room {{ $reservation->room->number ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $reservation->start_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $reservation->end_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $reservation->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                                               ($reservation->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                            {{ ucfirst($reservation->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $reservation->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($reservation->payment_status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="font-bold text-indigo-600">${{ $reservation->total_price }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                        @if($reservation->invoice && $reservation->payment_status !== 'paid')
                                            <a href="{{ route('invoices.show', $reservation->invoice) }}" 
                                               class="text-indigo-600 hover:text-indigo-900 font-semibold hover:underline">
                                                Pay
                                            </a>
                                        @endif
                                        @if($reservation->invoice)
                                            <a href="{{ route('invoices.show', $reservation->invoice) }}" 
                                               class="text-blue-600 hover:text-blue-900 font-semibold hover:underline">
                                                Invoice
                                            </a>
                                        @endif
                                        <form method="POST" action="{{ route('reservations.destroy', $reservation->Reservation_ID) }}" 
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to cancel this reservation?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800 font-semibold hover:underline transition-colors duration-200">
                                                Cancel
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6">
                {{ $reservations->links() }}
            </div>
        @else
            <div class="bg-white rounded-2xl shadow-lg p-12 text-center border border-gray-100">
                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <p class="text-xl text-gray-600 mb-4">You have no reservations yet.</p>
                <a href="{{ route('rooms.index-user') }}" 
                   class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                    Browse Rooms
                </a>
            </div>
        @endif
    </div>
</x-layout>
