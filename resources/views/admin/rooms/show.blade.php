<x-layout>
    <x-slot:heading>
        Room Details (Admin)
    </x-slot:heading>

    @if($room->image)
        <img src="{{ asset($room->image) }}" alt="Room {{ $room->number }}" class="w-full h-64 object-cover rounded mb-4">
    @endif

    <h2 class="font-bold text-xl mb-2">{{ $room->type }}</h2>
    <p><strong>Status:</strong> {{ $room->status }}</p>
    <p><strong>Price:</strong> ${{ $room->price }}</p>
    <p class="mt-2">{{ $room->description }}</p>

    
    #region  <div class="mt-4 flex gap-2">
        <a href="{{ route('admin.rooms.edit', $room) }}" 
           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-400">
           Edit
        </a>

        <form method="POST" action="{{ route('admin.rooms.destroy', $room) }}" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">
                Delete
            </button>
        </form>
    </div>
</x-layout>
