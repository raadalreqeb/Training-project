@php
use Carbon\Carbon;
@endphp

<x-layout>
    <x-slot:heading>
        All Reservations
    </x-slot:heading>

    <h1 class="text-2xl font-bold mb-6">Reservations</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left border-b">Reservation ID</th>
                    <th class="px-4 py-2 text-left border-b">User</th>
                    <th class="px-4 py-2 text-left border-b">Room</th>
                    <th class="px-4 py-2 text-left border-b">Price</th>
                    <th class="px-4 py-2 text-left border-b">Period</th>
                    <th class="px-4 py-2 text-left border-b">Days</th>
                    <th class="px-4 py-2 text-left border-b">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    @php
                        $start = Carbon::parse($reservation->start_date);
                        $end = Carbon::parse($reservation->end_date);
                        $days = $start->diffInDays($end) + 1; 
                    @endphp
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $reservation->Reservation_ID }}</td>
                        <td class="px-4 py-2">{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</td>
                        <td class="px-4 py-2">{{ $reservation->room->type }} ({{ $reservation->room->number }})</td>
                        <td class="px-4 py-2">${{ $reservation->room->price }}</td>
                        <td class="px-4 py-2">{{ $reservation->start_date }} → {{ $reservation->end_date }}</td>
                        <td class="px-4 py-2">{{ $days }}</td>
                        <td class="px-4 py-2">{{ ucfirst($reservation->status) }}</td>


                           <td class="px-4 py-2 flex gap-2">
                          
                            <a href="{{ route('admin.reservations.edit', $reservation) }}" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Edit
                            </a>

                           
                            <form action="{{ route('admin.reservations.destroy', $reservation) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this reservation?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $reservations->links() }}
    </div>
</x-layout>
