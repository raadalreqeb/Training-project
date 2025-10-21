<x-layout>
    <x-slot:heading>Room Reservation</x-slot:heading>

    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    Reserve Room #{{ $room->number }}
                </h2>
                <p class="text-gray-600">{{ $room->type }} - ${{ $room->price }}/night</p>
            </div>

            <!-- Error Message -->
            @if($errors->has('reservation_conflict'))
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-5 py-4 rounded-lg mb-6 flex items-start">
                    <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ $errors->first('reservation_conflict') }}</span>
                </div>
            @endif

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-5 py-4 rounded-lg mb-6 flex items-start">
                    <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="/rooms/{{ $room->room_id }}/reservation" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="start_date" class="block text-sm font-semibold text-gray-700 mb-2">Check-in Date</label>
                    <input type="date" name="start_date" id="start_date" 
                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300" 
                           value="{{ old('start_date') }}" required>
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-semibold text-gray-700 mb-2">Check-out Date</label>
                    <input type="date" name="end_date" id="end_date" 
                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300" 
                           value="{{ old('end_date') }}" required>
                </div>

                <div class="border-t border-gray-200 pt-6">
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold px-6 py-3.5 rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                        Confirm Reservation
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
