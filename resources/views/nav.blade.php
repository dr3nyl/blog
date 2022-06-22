<nav class="bg-white">
    <div class="flex justify-between mx-20 px-4">

        <div class="flex">

            <div class="flex items-center">
                        <!-- Website Logo -->
                        <a href="/" class="text-4xl"><h1><span class="text-blue-500 font-medium">drenyl</span>pomarejo</h1></a>
            </div>
        </div>

        <!-- Secondary Navbar items -->
        <div class="md:flex items-center space-x-3 ">
                @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="font-medium text-xl hover:text-blue-500">Welcome, {{ auth()->user()->name }}!</button>
                    </x-slot>
                
                @admin
                    <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">All Posts</x-dropdown-item>
                    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>
                @endadmin
                    <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                    </form>
                </x-dropdown>
            @else
                <a href="/register" class="text-xl font-medium {{ request()->is('register') ? 'text-blue-500' : '' }}">Register</a>
                <a href="/login" class="ml-6 text-xl font-medium  {{ request()->is('login') ? 'text-blue-500' : '' }}">Log In</a>
            @endauth
            

            <!-- <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a> -->
        </div>
        <!-- Mobile menu button -->
        {{-- <div class="md:hidden flex items-center">
            <button class="outline-none mobile-menu-button">
            <svg class=" w-6 h-6 hover:text-blue-500 "
                x-show="!showMenu"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        </div> --}}

    </div>
</nav>