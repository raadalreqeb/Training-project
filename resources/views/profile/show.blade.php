<x-layout>
    <x-slot:heading>Profile</x-slot:heading>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-xl font-bold mb-4">User Information</h2>
        <p><strong>Name:</strong> {{ auth()->user()->first_name }} - {{auth()->user()->last_name  }}</p>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
        <p><strong>Phone:</strong> {{ auth()->user()->phone ?? '-' }}</p>

        <div class="mt-4">
            <x-nav-link href="{{ route('profile.edit') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
                Edit Profile
            </x-nav-link>
        </div>
    </div>
</x-layout>
