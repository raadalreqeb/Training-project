<x-layout>
  <x-slot:heading>
    Register
  </x-slot>

  <div class="flex justify-center items-center min-h-screen px-4 py-12">
    <div class="w-full max-w-2xl">
      <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
        <div class="text-center mb-8">
          <h2 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Create Account</h2>
          <p class="text-gray-600 mt-2">Join us for an amazing experience</p>
        </div>

        <form method="post" action="/register" class="space-y-6">
          @csrf

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <x-form-label for="first_name">First Name</x-form-label>
              <div class="mt-2">
                <x-form-input id="first_name" name="first_name" />
                <x-form-error name="first_name" />
              </div>
            </div>

            <div>
              <x-form-label for="last_name">Last Name</x-form-label>
              <div class="mt-2">
                <x-form-input id="last_name" name="last_name" />
                <x-form-error name="last_name" />
              </div>
            </div>
          </div>

          <div>
            <x-form-label for="email">Email Address</x-form-label>
            <div class="mt-2">
              <x-form-input id="email" name="email" type="email" />
              <x-form-error name="email" />
            </div>
          </div>

          <div>
            <x-form-label for="phone">Phone Number</x-form-label>
            <div class="mt-2">
              <x-form-input id="phone" name="phone" />
              <x-form-error name="phone" />
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <x-form-label for="password">Password</x-form-label>
              <div class="mt-2">
                <x-form-input id="password" name="password" type="password" />
                <x-form-error name="password" />
              </div>
            </div>

            <div>
              <x-form-label for="password_confirmation">Confirm Password</x-form-label>
              <div class="mt-2">
                <x-form-input id="password_confirmation" name="password_confirmation" type="password" />
                <x-form-error name="password_confirmation" />
              </div>
            </div>
          </div>

          <div class="flex items-center justify-center gap-4 pt-6 border-t border-gray-200">
            <a href="/" class="px-6 py-2.5 border-2 border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 hover:border-gray-400 transition-all duration-300">
              Cancel
            </a>
            <x-from-button class="px-8">Register</x-from-button>
          </div>

          <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
              <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
              <span class="px-4 bg-white text-gray-500">Or sign up with</span>
            </div>
          </div>

          <a href="{{ route('google.login') }}"
             class="flex items-center justify-center gap-3 w-full bg-white border-2 border-gray-200 text-gray-700 px-4 py-3 rounded-xl shadow-sm hover:bg-gray-50 hover:border-gray-300 hover:shadow-md transition-all duration-300 font-medium">
            <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5">
            <span>Sign up with Google</span>
          </a>

          <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
              Already have an account? 
              <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500 transition-colors">Sign in</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>