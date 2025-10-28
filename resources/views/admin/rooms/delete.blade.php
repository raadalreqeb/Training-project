<x-layout>
    <x-slot:heading>
        Delete Room
    </x-slot:heading>

    <div class="max-w-2xl mx-auto px-4 py-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-red-200">
            <div class="bg-red-50 px-6 py-4 border-b border-red-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-bold text-red-800">Delete Confirmation</h3>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="mb-6">
                    <p class="text-gray-700 text-lg mb-4">Are you sure you want to delete this room?</p>
                    
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Room Number</p>
                                <p class="font-bold text-gray-900">{{ $room->number }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Room Type</p>
                                <p class="font-bold text-gray-900">{{ $room->type }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Price</p>
                                <p class="font-bold text-gray-900">${{ $room->price }}/night</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Status</p>
                                <p class="font-bold text-gray-900">{{ ucfirst($room->status) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">
                                <strong>Warning:</strong> This action cannot be undone. All reservations associated with this room will also be deleted.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex gap-4">
                    <a href="{{ route('admin.rooms.show', $room) }}" 
                       class="flex-1 text-center bg-gray-200 text-gray-800 px-6 py-3 rounded-xl font-semibold hover:bg-gray-300 transition-all duration-300">
                        Cancel
                    </a>
                    
                    <form method="POST" action="{{ route('admin.rooms.destroy', $room) }}" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-red-600 hover:to-red-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                            Yes, Delete Room
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
