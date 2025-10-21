<x-layout>
    <x-slot:heading>
        Room Details (Admin)
    </x-slot:heading>

    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            @if($room->image)
                <div class="overflow-hidden">
                    <img src="{{ asset($room->image) }}" alt="Room {{ $room->number }}" class="w-full h-96 object-cover">
                </div>
            @endif

            <div class="p-8">
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $room->type }}</h2>
                        <p class="text-gray-600">Room Number: {{ $room->number }}</p>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold text-indigo-600">${{ $room->price }}</div>
                        <p class="text-sm text-gray-500">per night</p>
                    </div>
                </div>

                <div class="mb-6">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold {{ $room->status === 'available' ? 'bg-green-100 text-green-700' : ($room->status === 'booked' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                        <span class="w-2 h-2 rounded-full mr-2 {{ $room->status === 'available' ? 'bg-green-500' : ($room->status === 'booked' ? 'bg-red-500' : 'bg-yellow-500') }}"></span>
                        {{ ucfirst($room->status) }}
                    </span>
                </div>

                <div class="prose max-w-none mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Description</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $room->description }}</p>
                </div>

                <div class="border-t border-gray-200 pt-6 flex gap-4">
                    <a href="{{ route('admin.rooms.edit', $room) }}" 
                       class="flex-1 text-center bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-6 py-3.5 rounded-xl font-semibold hover:from-yellow-600 hover:to-orange-600 transition-all duration-300 shadow-lg hover:shadow-xl">
                       Edit Room
                    </a>

                    <form method="POST" action="{{ route('admin.rooms.destroy', $room) }}" onsubmit="return confirm('Are you sure you want to delete this room?')" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3.5 rounded-xl font-semibold hover:from-red-600 hover:to-red-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                            Delete Room
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
