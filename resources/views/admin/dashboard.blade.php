<x-layout>
    <x-slot:heading>
        Admin Dashboard

    
    </x-slot:heading>

    <h1 class="text-2xl font-bold mb-6">Rooms</h1>

    <!-- Grid container -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($rooms as $room)
            <div class="border rounded-lg shadow p-4 flex flex-col">
                @if($room->image)
                    <img src="{{ asset($room->image) }}" 
                         alt="Room {{ $room->number }}" 
                         class="w-full h-48 object-cover rounded mb-3">
                @else
                    <div class="w-full h-48 bg-gray-200 rounded mb-3 flex items-center justify-center">
                        No Image
                    </div>
                @endif

                <h2 class="text-lg font-semibold mb-1">Room {{ $room->number ?? $room->id }} - {{ $room->type }}</h2>
                <p>Status: <span class="font-medium">{{ $room->status }}</span></p>
                <p>Price: ${{ $room->price }}</p>
                <p class="text-sm text-gray-600 mt-2">{{ $room->description }}</p>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $rooms->links() }}
    </div>
</x-layout>
