<x-layout>
    <x-slot:heading>
        Available Rooms
    </x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 px-4">
        @foreach ($rooms as $room)
            <a href="/rooms/{{ $room['room_id'] }}" class="group block bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:scale-105">
                <div class="overflow-hidden">
                    @if($room->image && file_exists(public_path('storage/' . $room->image)))
                        <img src="{{ asset('storage/' . $room->image) }}" 
                             alt="Room {{ $room->number }}" 
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                    @else
                        <div class="w-full h-48 bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center">
                            <svg class="w-16 h-16 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>

                <div class="p-5">
                    <div class="flex items-center justify-between mb-3">
                        <h2 class="font-bold text-lg text-gray-800">Room {{ $room->number }}</h2>
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $room->status === 'available' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ ucfirst($room->status) }}
                        </span>
                    </div>
                    <p class="text-gray-600 text-sm mb-3">{{ $room->type }}</p>
                    <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                        <span class="text-2xl font-bold text-indigo-600">${{ $room->price }}</span>
                        <span class="text-sm text-gray-500">per night</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $rooms->links() }}
    </div>
</x-layout>