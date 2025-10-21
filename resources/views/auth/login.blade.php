<x-layout>
    <x-slot:heading>
       Log In
    </x-slot>

 <div class="min-h-[600px] flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Welcome Back</h2>
                <p class="text-gray-600 mt-2">Sign in to your account</p>
            </div>

            <form method="post" action="/login" class="space-y-6">
                @csrf

                <div>
                    <x-form-label for="email">Email Address</x-form-label>
                    <div class="mt-2">
                        <x-form-input id="email" name="email" type="email" :value="old('email')" />
                        <x-form-error name="email" />
                    </div>
                </div>

                <div>
                    <x-form-label for="password">Password</x-form-label>
                    <div class="mt-2">
                        <x-form-input id="password" name="password" type="password" />
                        <x-form-error name="password" />
                    </div>
                </div>

                <div class="flex items-center justify-between gap-x-6 pt-4">
                    <a href="/" class="text-sm font-semibold text-gray-600 hover:text-gray-900 transition-colors">Cancel</a>
                    <x-from-button class="flex-1">Log In</x-from-button>
                </div>
            </form>

            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">Or continue with</span>
                </div>
            </div>

            <a href="{{ route('google.login') }}" 
               class="flex items-center justify-center gap-3 w-full bg-white border-2 border-gray-200 text-gray-700 px-4 py-3 rounded-xl shadow-sm hover:bg-gray-50 hover:border-gray-300 hover:shadow-md transition-all duration-300 font-medium">
                <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5">
                <span>Sign in with Google</span>
            </a>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                    Don't have an account? 
                    <a href="/register" class="font-semibold text-indigo-600 hover:text-indigo-500 transition-colors">Sign up</a>
                </p>
            </div>
        </div>
    </div>
 </div>
</x-layout>