<x-layout>
    <x-slot name="heading">My Reservations</x-slot>

    @if(session('success'))
        <div class="mb-4 p-2 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($reservations->count())
        <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Room</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Start Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">End Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($reservations as $reservation)
                    <tr>
                        <td class="px-6 py-4">{{ $reservation->room->type ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $reservation->start_date }}</td>
                        <td class="px-6 py-4">{{ $reservation->end_date }}</td>
                        <td class="px-6 py-4 capitalize">{{ $reservation->status }}</td>
                        <td class="px-6 py-4">{{ $reservation->total_price }} JD</td>
                        <td class="px-6 py-4">
                            <!-- مثال على زر إلغاء الحجز -->
                            <form method="POST" action="{{ route('reservations.destroy', $reservation->Reservation_ID) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-900 text-sm">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $reservations->links() }}
        </div>
    @else
        <p>You have no reservations yet.</p>
    @endif

</x-layout>
