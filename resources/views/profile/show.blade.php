<x-layout>
    <x-slot:heading>Profile</x-slot:heading>

    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="text-center mb-8">
                <div class="w-24 h-24 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 mx-auto mb-4 flex items-center justify-center text-white text-3xl font-bold shadow-lg">
                    {{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }}{{ strtoupper(substr(auth()->user()->last_name, 0, 1)) }}
                </div>
                <h2 class="text-2xl font-bold text-gray-800">User Information</h2>
                <p class="text-gray-600 mt-1">Manage your personal details</p>
            </div>

            <div class="space-y-4">
                <div class="border-b border-gray-200 pb-4">
                    <label class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Full Name</label>
                    <p class="text-lg font-medium text-gray-800 mt-1">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                </div>

                <div class="border-b border-gray-200 pb-4">
                    <label class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Email Address</label>
                    <p class="text-lg font-medium text-gray-800 mt-1">{{ auth()->user()->email }}</p>
                </div>

                <div class="pb-4">
                    <label class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Phone Number</label>
                    <p class="text-lg font-medium text-gray-800 mt-1">{{ auth()->user()->phone ?? 'Not provided' }}</p>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('profile.edit') }}" class="inline-block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3.5 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
</x-layout>
