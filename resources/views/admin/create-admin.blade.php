<x-layout>
    <x-slot:heading>
        Create New Admin
    </x-slot:heading>

    <div class="max-w-2xl mx-auto px-4 py-8">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Administrator</h2>

            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 text-green-700 px-5 py-4 rounded-lg">
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 px-5 py-4 rounded-lg">
                    <p class="font-medium">{{ session('error') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 px-5 py-4 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('create.admin') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                    <input type="text" 
                           name="first_name" 
                           id="first_name" 
                           value="{{ old('first_name') }}"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>

                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                    <input type="text" 
                           name="last_name" 
                           id="last_name" 
                           value="{{ old('last_name') }}"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email') }}"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone (Optional)</label>
                    <input type="text" 
                           name="phone" 
                           id="phone" 
                           value="{{ old('phone') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           required
                           minlength="8"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <p class="mt-1 text-sm text-gray-500">Minimum 8 characters</p>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input type="password" 
                           name="password_confirmation" 
                           id="password_confirmation" 
                           required
                           minlength="8"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>

                <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded">
                    <div class="flex">
                        <svg class="w-5 h-5 text-yellow-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-sm text-yellow-700">
                            <strong>Warning:</strong> This will create a new user with full administrator privileges.
                        </p>
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" 
                            class="flex-1 bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                        Create Admin
                    </button>
                    <a href="{{ route('admin.rooms.index') }}" 
                       class="flex-1 text-center bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition-all duration-300">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
