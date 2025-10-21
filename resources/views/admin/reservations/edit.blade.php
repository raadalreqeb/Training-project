<x-layout>
    <x-slot:heading>
        Edit Reservation
    </x-slot:heading>

    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Edit Reservation #{{ $reservation->Reservation_ID }}</h1>
                <p class="text-gray-600 mt-2">Update reservation details</p>
            </div>

            <form action="{{ route('admin.reservations.update', $reservation) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="start_date" class="block text-sm font-semibold text-gray-700 mb-2">Check-in Date</label>
                    <input type="date" name="start_date" id="start_date"
                           value="{{ old('start_date', $reservation->start_date) }}"
                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300">
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-semibold text-gray-700 mb-2">Check-out Date</label>
                    <input type="date" name="end_date" id="end_date"
                           value="{{ old('end_date', $reservation->end_date) }}"
                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300">
                </div>

                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Reservation Status</label>
                    <select name="status" id="status" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300">
                        <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div class="flex items-center gap-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.reservations.index') }}" class="px-6 py-2.5 border-2 border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 hover:border-gray-400 transition-all duration-300">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="flex-1 bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                        Update Reservation
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
