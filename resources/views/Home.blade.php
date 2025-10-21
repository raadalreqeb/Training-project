<x-layout>
    <x-slot:heading>
        Welcome to Hotel Abd Al-Qader
    </x-slot:heading>

    <!-- Hero Section -->
    <div class="relative bg-gray-900 overflow-hidden rounded-2xl shadow-2xl mb-12">
        <img src="https://images.unsplash.com/photo-1501117716987-c8e1ecb21055" 
             class="w-full h-[500px] object-cover opacity-60" alt="Hotel Abd Al-Qader">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
        <div class="absolute inset-0 flex items-center justify-center">
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
                <div class="overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" 
                         class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300" alt="Single Room">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Single Room</h3>
                    <p class="text-gray-600 mb-4">Perfect for individuals with a nice view.</p>
                    <a href="/rooms" class="inline-block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2.5 rounded-lg font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-md hover:shadow-lg">Book Now</a>
                </div>
            </div>

            <!-- Room Card -->
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:scale-105">
                <div class="overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32" 
                         class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300" alt="Double Room">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Double Room</h3>
                    <p class="text-gray-600 mb-4">Ideal for couples with extra space.</p>
                    <a href="/rooms" class="inline-block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2.5 rounded-lg font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-md hover:shadow-lg">Book Now</a>
                </div>
            </div>

            <!-- Room Card -->
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:scale-105">
                <div class="overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1628744879974-0e2e0e3b209d" 
                         class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300" alt="Luxury Suite">
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
