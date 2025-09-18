<x-layout>
    <x-slot:heading>
        Welcome to Hotel Abd Al-Qader
    </x-slot:heading>

    <!-- Hero Section -->
    <div class="relative bg-gray-900">
        <img src="https://images.unsplash.com/photo-1501117716987-c8e1ecb21055" 
             class="w-full h-[500px] object-cover opacity-70" alt="Hotel Abd Al-Qader">
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-5xl font-bold text-white">Welcome to Hotel Abdel Qader</h1>
        </div>
    </div>

    <!-- About -->
    <section class="max-w-4xl mx-auto py-12 text-center">
        <h2 class="text-3xl font-semibold mb-4">About Hotel Abd AlQader</h2>
        <p class="text-gray-700">
            Hotel Abd AlQader offers a unique experience that blends comfort and luxury. 
            Enjoy breathtaking views, premium services, and a stay you will never forget.
        </p>
    </section>

    <!-- Rooms Preview -->
    <section class="max-w-6xl mx-auto py-12">
        <h2 class="text-3xl font-semibold text-center mb-8">Available Rooms</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Room Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" 
                     class="w-full h-48 object-cover" alt="Single Room">
                <div class="p-4">
                    <h3 class="text-xl font-bold">Single Room</h3>
                    <p class="text-gray-600">Perfect for individuals with a nice view.</p>
                    <a href="/rooms" class="mt-3 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg">Book Now</a>
                </div>
            </div>

            <!-- Room Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32" 
                     class="w-full h-48 object-cover" alt="Double Room">
                <div class="p-4">
                    <h3 class="text-xl font-bold">Double Room</h3>
                    <p class="text-gray-600">Ideal for couples with extra space.</p>
                    <a href="/rooms" class="mt-3 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg">Book Now</a>
                </div>
            </div>

            <!-- Room Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <img src="https://images.unsplash.com/photo-1628744879974-0e2e0e3b209d" 
                     class="w-full h-48 object-cover" alt="Luxury Suite">
                <div class="p-4">
                    <h3 class="text-xl font-bold">Luxury Suite</h3>
                    <p class="text-gray-600">The ultimate luxury experience for a memorable stay.</p>
                    <a href="/rooms" class="mt-3 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg">Book Now</a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
