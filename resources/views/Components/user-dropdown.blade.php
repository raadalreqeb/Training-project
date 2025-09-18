<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div class="relative ml-3" x-data="{ open: false }">
    <!-- Trigger button -->
    <button @click="open = !open" type="button"
        class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
        <span class="sr-only">Open user menu</span>
        <img class="h-8 w-8 rounded-full"
            src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff"
            alt="{{ auth()->user()->name }}">
    </button>

    <!-- Dropdown menu -->
    <div x-show="open" @click.away="open = false"
        x-transition
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5"
        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

     <x-nav-link href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
    role="menuitem">Profile</x-nav-link>
        <a href="{{ route('reservations.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Reservations</a>

        <form method="post" action="/logout">
            @csrf
            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Log out
            </button>
        </form>
    </div>
</div>