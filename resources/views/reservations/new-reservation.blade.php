<x-layout>
    <x-slot:heading>Room Reservation</x-slot:heading>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">
            Reserve Room: #{{ $room->number }} - {{ $room->type }}
        </h2>

        <!-- Success Message -->
         @if($errors->has('reservation_conflict'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ $errors->first('reservation_conflict') }}
            </div>
        @endif

      
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

      
        <form action="/rooms/{{ $room->room_id }}/reservation" method="POST">
            @csrf

          
            <div class="mb-4">
                <label for="start_date" class="block font-medium mb-1">Start Date</label>
                <input type="date" name="start_date" id="start_date" 
                       class="w-full border rounded px-3 py-2" value="{{ old('start_date') }}" required>
            </div>

            <!-- End Date -->
            <div class="mb-4">
                <label for="end_date" class="block font-medium mb-1">End Date</label>
                <input type="date" name="end_date" id="end_date" 
                       class="w-full border rounded px-3 py-2" value="{{ old('end_date') }}" required>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="w-full bg-blue-500 text-white font-bold px-4 py-2 rounded hover:bg-blue-600 transition">
                    Confirm Reservation
                </button>
            </div>
        </form>
    </div>
</x-layout>
