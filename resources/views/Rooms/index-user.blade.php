<x-layout>
    <x-slot:heading>
        Available Rooms
    </x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($rooms as $room)

                      
         <a href="/rooms/{{ $room['room_id'] }} " class=" block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="border rounded-lg overflow-hidden shadow hover:shadow-lg transition duration-300">
               <img src="{{ asset('storage/' . $room->image) }}" 
     alt="Room {{ $room->number }}" 
     class="w-full h-48 object-cover">

                <div class="p-4">
                    <h2 class="font-bold text-lg mb-2">Room {{ $room->number }} - {{ $room->type }}</h2>
                    <p class="mb-1">Price: ${{ $room->price }}</p>
                    <p>Status: {{ $room->status }}</p>
                </div>
            </div>
         </a>
        @endforeach
    </div>


     <div class="mt-6">
        {{ $rooms->links() }}
    </div>
</x-layout>