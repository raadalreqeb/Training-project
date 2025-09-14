<x-layout>
    <x-slot:heading>
        Create Room
    </x-slot:heading>

    <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

         <div>
        <label class="block mb-1">Type</label>
        <select name="type" class="border p-2 w-full" required>
            @php
                $types = ['Single', 'Double', 'Suite'];
            @endphp
            @foreach($types as $type)
                <option value="{{ $type }}">{{ $type }}</option>
            @endforeach
        </select>
    </div>
 <div>
        <label class="block mb-1">Status</label>
        <select name="status" class="border p-2 w-full" required>
            @php
                $statuses = ['available', 'booked', 'maintenance'];
            @endphp
            @foreach($statuses as $status)
                <option value="{{ $status }}">{{ ucfirst($status) }}</option>
            @endforeach
        </select>
    </div>
        <div class="mb-4">
            <label class="block mb-1">Price</label>
            <input type="number" name="price" value="{{ old('price') }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
          <label class="block mb-1">Room Number</label>
          <input type="text" name="number" class="border p-2 w-full" required>
      </div>

        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Image</label>
            <input type="file" name="image" class="w-full">
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-400">
            Create Room
        </button>
    </form>
</x-layout>
