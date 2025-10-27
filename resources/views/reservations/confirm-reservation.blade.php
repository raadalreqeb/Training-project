<x-layout>
    <x-slot:heading>Confirm Your Reservation</x-slot:heading>

    <div class="max-w-3xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            
            <!-- Header -->
            <div class="text-center mb-8 pb-6 border-b border-gray-200">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">
                    Review Your Booking
                </h2>
                <p class="text-gray-600">Please confirm the details below before proceeding</p>
            </div>

            <!-- Booking Details -->
            <div class="space-y-6 mb-8">
                <!-- Room Details -->
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Room Information
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Room Number</p>
                            <p class="text-xl font-bold text-gray-800">#{{ $room->number }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Room Type</p>
                            <p class="text-xl font-bold text-gray-800">{{ $room->type }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Price per Night</p>
                            <p class="text-xl font-bold text-indigo-600">${{ number_format($room->price, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Number of Nights</p>
                            <p class="text-xl font-bold text-gray-800">{{ $nights }}</p>
                        </div>
                    </div>
                </div>

                <!-- Date Details -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-xl p-5">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            <p class="text-sm font-semibold text-gray-700">Check-in Date</p>
                        </div>
                        <p class="text-2xl font-bold text-gray-800">{{ \Carbon\Carbon::parse($start_date)->format('M d, Y') }}</p>
                        <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($start_date)->format('l') }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-5">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                            <p class="text-sm font-semibold text-gray-700">Check-out Date</p>
                        </div>
                        <p class="text-2xl font-bold text-gray-800">{{ \Carbon\Carbon::parse($end_date)->format('M d, Y') }}</p>
                        <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($end_date)->format('l') }}</p>
                    </div>
                </div>

                <!-- Price Breakdown -->
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border-2 border-green-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Price Summary</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-gray-700">
                            <span>${{ number_format($room->price, 2) }} × {{ $nights }} {{ $nights == 1 ? 'night' : 'nights' }}</span>
                            <span class="font-semibold">${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="border-t-2 border-green-200 pt-3 flex justify-between items-center">
                            <span class="text-xl font-bold text-gray-800">Total Amount</span>
                            <span class="text-3xl font-bold text-green-600">${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Confirmation Message -->
            <div class="mb-6 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-800 px-5 py-4 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="font-semibold mb-1">Are you sure you want to proceed?</p>
                        <p class="text-sm">
                            By clicking "Confirm Booking", you agree to reserve this room for the selected dates. The reservation status will be set to <strong>pending</strong> and payment status as <strong>unpaid</strong>.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="grid md:grid-cols-2 gap-4 pt-6 border-t border-gray-200">
                <!-- Cancel Button -->
                <form action="/rooms/{{ $room->room_id }}/reservation/create" method="GET">
                    <button type="submit" 
                            class="w-full bg-gray-100 text-gray-700 font-bold px-6 py-3.5 rounded-xl hover:bg-gray-200 transition-all duration-300 border-2 border-gray-300">
                        ✕ Cancel & Go Back
                    </button>
                </form>

                <!-- Confirm Button -->
                <form action="/rooms/{{ $room->room_id }}/reservation" method="POST">
                    @csrf
                    <input type="hidden" name="start_date" value="{{ $start_date }}">
                    <input type="hidden" name="end_date" value="{{ $end_date }}">
                    
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold px-6 py-3.5 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                        ✓ Confirm Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
