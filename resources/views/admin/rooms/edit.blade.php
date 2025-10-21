<x-layout>
    <x-slot:heading>
        Edit Room
    </x-slot:heading>

    <div class="max-w-3xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Edit Room Details</h2>
                <p class="text-gray-600 mt-2">Update the room information</p>
            </div>

            <form action="{{ route('admin.rooms.update', $room) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Room Type</label>
                        <input type="text" name="type" value="{{ $room->type }}" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Room Number</label>
                        <input type="text" name="number" value="{{ $room->number }}" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <select name="status" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300" required>
                            <option value="available" {{ $room->status === 'available' ? 'selected' : '' }}>Available</option>
                            <option value="booked" {{ $room->status === 'booked' ? 'selected' : '' }}>Booked</option>
                            <option value="maintenance" {{ $room->status === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Price (per night)</label>
                        <input type="number" name="price" value="{{ $room->price }}" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="4" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300">{{ $room->description }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Room Image</label>
                    @if($room->image)
                        <div class="mb-4 rounded-xl overflow-hidden border-2 border-gray-200 inline-block">
                            <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" class="w-full max-w-md h-48 object-cover">
                        </div>
                        <p class="text-sm text-gray-600 mb-2">Current image above</p>
                    @else
                        <p class="text-sm text-gray-500 mb-3">No image uploaded</p>
                    @endif
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload New Image (optional)</label>
                    <input type="file" name="image" accept="image/*" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>

                <div class="flex items-center gap-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.rooms.index') }}" class="px-6 py-2.5 border-2 border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 hover:border-gray-400 transition-all duration-300">
                        Cancel
                    </a>
                    <button type="submit" class="flex-1 bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-6 py-3 rounded-xl font-semibold hover:from-yellow-600 hover:to-orange-600 transition-all duration-300 shadow-lg hover:shadow-xl">
                        Update Room
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
