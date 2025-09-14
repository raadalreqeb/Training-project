<x-layout>
    <x-slot:heading>
        All Rooms
     
<a href="{{ route('admin.rooms.create') }}" 
   class="bg-green-500 text-white text-sm px-3 py-1 rounded hover:bg-green-400 mr-4">
   Add Room
</a>

<a href="{{ route('admin.reservations.index') }}" 
   class="bg-green-500 text-white text-sm px-3 py-1 rounded hover:bg-green-400">
   Show Reservations
</a>

    </x-slot:heading>

    <h1 class="text-2xl font-bold mb-6">Rooms</h1>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($rooms as $room)
          
            <a href="{{ auth()->user()->role_id === 1 
                         ? route('admin.rooms.show', $room) 
                         : route('rooms.show', $room) }}" 
               class="block border rounded-lg shadow p-4 hover:shadow-lg transition duration-300">
               
                @if($room->image)
                    <img src="{{ asset('storage/' . $room->image) }}" 
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
            </a>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $rooms->links() }}
    </div>
</x-layout>
