<x-layout>
    <x-slot:heading>
        Room Details
    </x-slot:heading>

    <div class="max-w-xl mx-auto border rounded-lg shadow p-4">
    
        @if($room->image)
            <img src="{{ asset('storage/' . $room->image) }}" 
                 alt="Room {{ $room->number }}" 
                 class="w-full h-64 object-cover rounded mb-4">
        @endif

        
        <h2 class="font-bold text-xl mb-2">{{ $room->type }}</h2>
        <p><strong>Status:</strong> {{ $room->status }}</p>
        <p><strong>Price:</strong> ${{ $room->price }}</p>
        <p class="mt-2">{{ $room->description }}</p>

        
        <div class="mt-4">
            <a href="{{ route('reservations.create', $room) }}" 
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
               Book
            </a>
        </div>
    </div>
</x-layout>
