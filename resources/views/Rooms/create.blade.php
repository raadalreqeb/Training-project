<x-layout>
    <x-slot:heading>
        Create New Room
    </x-slot>

    <form action="/rooms" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>Room Number</label>
            <input type="text" name="number" class="border p-2 rounded" required>
        </div>

        <div>
            <label>Type</label>
            <input type="text" name="type" class="border p-2 rounded">
        </div>

        <div>
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="border p-2 rounded" required>
        </div>

        <div>
            <label>Status</label>
            <select name="status" class="border p-2 rounded">
                <option value="available">Available</option>
                <option value="booked">Booked</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Create Room
        </button>
    </form>
</x-layout>