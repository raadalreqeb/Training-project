<x-layout>
    <x-slot:heading>
        Room Details
    </x-slot:heading>

    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="overflow-hidden">
                @if($room->image && file_exists(public_path('storage/' . $room->image)))
                    <img src="{{ asset('storage/' . $room->image) }}" 
                         alt="Room {{ $room->number }}" 
                         class="w-full h-96 object-cover">
                @else
                    <div class="w-full h-96 bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-24 h-24 mx-auto text-indigo-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-indigo-400 font-semibold">No Image Available</p>
                        </div>
                    </div>
                @endif
            </div>

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
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold {{ $room->status === 'available' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                        <span class="w-2 h-2 rounded-full mr-2 {{ $room->status === 'available' ? 'bg-green-500' : 'bg-gray-500' }}"></span>
                        {{ ucfirst($room->status) }}
                    </span>
                </div>

                <div class="prose max-w-none mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Description</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $room->description }}</p>
                </div>

                <div class="border-t border-gray-200 pt-6">
                    <a href="{{ route('reservations.create', $room) }}" 
                       class="inline-block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3.5 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                       Book This Room
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
