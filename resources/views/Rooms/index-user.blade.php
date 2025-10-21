<x-layout>
    <x-slot:heading>
        Available Rooms
    </x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 px-4">
        @foreach ($rooms as $room)
            <a href="/rooms/{{ $room['room_id'] }}" class="group block bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:scale-105">
                <div class="overflow-hidden">
                    <img src="{{ asset('storage/' . $room->image) }}" 
                         alt="Room {{ $room->number }}" 
                         class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
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