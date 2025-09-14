<x-layout>
    <x-slot:heading>
        Edit Reservation
    </x-slot:heading>

    <h1 class="text-2xl font-bold mb-6">Edit Reservation #{{ $reservation->Reservation_ID }}</h1>

    <form action="{{ route('admin.reservations.update', $reservation) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

       
        <div>
            <label for="start_date" class="block text-sm font-medium">Start Date</label>
            <input type="date" name="start_date" id="start_date"
                   value="{{ old('start_date', $reservation->start_date) }}"
                   class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
        </div>

    
        <div>
            <label for="end_date" class="block text-sm font-medium">End Date</label>
            <input type="date" name="end_date" id="end_date"
                   value="{{ old('end_date', $reservation->end_date) }}"
                   class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
        </div>

       
        <div>
            <label for="status" class="block text-sm font-medium">Status</label>
            <select name="status" id="status" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        
        <div>
            <button type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update Reservation
            </button>
        </div>
    </form>
</x-layout>
