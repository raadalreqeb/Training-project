<x-layout>
    <x-slot:heading>Edit Profile</x-slot:heading>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-xl font-bold mb-4">Edit Your Information</h2>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}"
                    class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Last Name</label>
                <input type="text" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}"
                    class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                    class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                    class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <x-from-button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
                Save Changes
            </x-from-button>
        </form>
    </div>
</x-layout>
