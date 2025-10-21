<x-layout>
    <x-slot:heading>
        Admin Dashboard
    </x-slot:heading>

    <div class="px-4">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Rooms Overview</h1>
            <p class="text-gray-600 mt-1">Manage and monitor all hotel rooms</p>
        </div>

        <!-- Grid container -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($rooms as $room)
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="overflow-hidden">
                        @if($room->image)
                            <img src="{{ asset($room->image) }}" 
                                 alt="Room {{ $room->number }}" 
                                 class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <div class="p-5">
                        <div class="flex items-center justify-between mb-3">
                            <h2 class="text-lg font-bold text-gray-800">Room {{ $room->number ?? $room->id }}</h2>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $room->status === 'available' ? 'bg-green-100 text-green-700' : ($room->status === 'booked' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                {{ ucfirst($room->status) }}
                            </span>
                        </div>
                        <p class="text-gray-600 mb-2">{{ $room->type }}</p>
                        <p class="text-2xl font-bold text-indigo-600 mb-3">${{ $room->price }}<span class="text-sm font-normal text-gray-500">/night</span></p>
                        <p class="text-sm text-gray-600 line-clamp-2">{{ $room->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $rooms->links() }}
        </div>
    </div>
</x-layout>
