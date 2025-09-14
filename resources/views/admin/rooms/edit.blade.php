<x-layout>
    <x-slot:heading>
        Edit Room
    </x-slot:heading>

    <form action="{{ route('admin.rooms.update', $room) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Type</label>
            <input type="text" name="type" value="{{ $room->type }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Status</label>
            <input type="text" name="status" value="{{ $room->status }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Price</label>
            <input type="number" name="price" value="{{ $room->price }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ $room->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Current Image</label>
            @if($room->image)
                <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" class="w-64 h-40 object-cover mb-2 rounded">
            @else
                <p>No image uploaded</p>
            @endif
            <label class="block mt-2 mb-1">Change Image</label>
            <input type="file" name="image" class="w-full">
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-400">
            Update Room
        </button>
    </form>
</x-layout>
