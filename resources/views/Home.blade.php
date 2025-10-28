<x-layout>
    <x-slot:heading>
        Welcome to Hotel Abd Al-Qader
    </x-slot:heading>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 overflow-hidden rounded-2xl shadow-2xl mb-12">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative h-[500px] flex items-center justify-center">
            <div class="text-center px-4">
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg">Welcome to Abd AlQader Hotel</h1>
                <p class="text-xl text-gray-200 max-w-2xl mx-auto">Experience luxury and comfort in every moment</p>
            </div>
        </div>
    </div>

    <!-- About -->
    <section class="max-w-4xl mx-auto py-12 px-4">
        <div class="text-center bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <h2 class="text-3xl font-bold mb-6 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">About Hotel Abd AlQader</h2>
            <p class="text-gray-600 leading-relaxed text-lg">
                Hotel Abd AlQader offers a unique experience that blends comfort and luxury. 
                Enjoy breathtaking views, premium services, and a stay you will never forget.
            </p>
        </div>
    </section>

    <!-- Rooms Preview -->
    <section class="max-w-6xl mx-auto py-12 px-4">
        <h2 class="text-3xl font-bold text-center mb-10 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Available Rooms</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Room Card -->
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:scale-105">
                <div class="overflow-hidden bg-gradient-to-br from-blue-100 to-indigo-200 h-48 flex items-center justify-center">
                    <div class="text-center p-4">
                        <svg class="w-16 h-16 mx-auto text-indigo-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <p class="text-sm font-medium text-indigo-700">Single Room</p>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Single Room</h3>
                    <p class="text-gray-600 mb-4">Perfect for individuals with a nice view.</p>
                    <a href="/rooms" class="inline-block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2.5 rounded-lg font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-md hover:shadow-lg">Book Now</a>
                </div>
            </div>

            <!-- Room Card -->
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:scale-105">
                <div class="overflow-hidden bg-gradient-to-br from-purple-100 to-pink-200 h-48 flex items-center justify-center">
                    <div class="text-center p-4">
                        <svg class="w-16 h-16 mx-auto text-purple-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <p class="text-sm font-medium text-purple-700">Double Room</p>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Double Room</h3>
                    <p class="text-gray-600 mb-4">Ideal for couples with extra space.</p>
                    <a href="/rooms" class="inline-block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2.5 rounded-lg font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-md hover:shadow-lg">Book Now</a>
                </div>
            </div>

            <!-- Room Card -->
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:scale-105">
                <div class="overflow-hidden bg-gradient-to-br from-amber-100 to-orange-200 h-48 flex items-center justify-center">
                    <div class="text-center p-4">
                        <svg class="w-16 h-16 mx-auto text-amber-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                        <p class="text-sm font-medium text-amber-700">Luxury Suite</p>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Luxury Suite</h3>
                    <p class="text-gray-600 mb-4">The ultimate luxury experience for a memorable stay.</p>
                    <a href="/rooms" class="inline-block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2.5 rounded-lg font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-md hover:shadow-lg">Book Now</a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
