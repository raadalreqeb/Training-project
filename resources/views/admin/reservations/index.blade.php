@php
use Carbon\Carbon;
@endphp

<x-layout>
    <x-slot:heading>
        All Reservations
    </x-slot:heading>

    <div class="px-4">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Reservations Management</h1>
            <p class="text-gray-600 mt-1">View and manage all hotel reservations</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Guest</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Room</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Price/Night</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Period</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Days</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($reservations as $reservation)
                            @php
                                $start = Carbon::parse($reservation->start_date);
                                $end = Carbon::parse($reservation->end_date);
                                $days = $start->diffInDays($end) + 1; 
                            @endphp
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="font-semibold text-gray-800">#{{ $reservation->Reservation_ID }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-800">{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</div>
                                    <div class="text-sm text-gray-500">{{ $reservation->user->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-semibold text-gray-800">{{ $reservation->room->type }}</div>
                                    <div class="text-sm text-gray-500">Room {{ $reservation->room->number }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="font-bold text-indigo-600">${{ $reservation->room->price }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-700">{{ $reservation->start_date }}</div>
                                    <div class="text-sm text-gray-500">to {{ $reservation->end_date }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $days }} {{ $days === 1 ? 'day' : 'days' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $reservation->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                                           ($reservation->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($reservation->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex gap-2">
                                        <a href="{{ route('admin.reservations.edit', $reservation) }}" 
                                           class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-yellow-500 to-orange-500 text-white text-sm rounded-lg hover:from-yellow-600 hover:to-orange-600 transition-all duration-300 font-medium shadow-sm hover:shadow-md">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.reservations.destroy', $reservation) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this reservation?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-red-500 to-red-600 text-white text-sm rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 font-medium shadow-sm hover:shadow-md">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-8">
            {{ $reservations->links() }}
        </div>
    </div>
</x-layout>
