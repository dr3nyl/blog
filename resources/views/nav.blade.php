<nav class="bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between">

        <div class="flex">

            <div class="flex items-center">
                        <!-- Website Logo -->
                        <img src="/images/logo.svg" alt="Laracasts Logo" width="180" height="12" class="rounded-md">
                    </div>
            </div>

            <div class="flex">
                
                <!-- Primary Navbar items -->
                <div class="hidden md:flex items-center space-x-2">
                    <a href="" class="py-4 text-md px-2 hover:text-blue-500 transition duration-300">Home</a>
                    <a href="/" class="py-4 text-md px-2 hover:text-blue-500 transition duration-300">Articles</a>
                    <a href="" class="py-4 text-md px-2 hover:text-blue-500 transition duration-300">About</a>
                    <a href="" class="py-4 text-md px-2 hover:text-blue-500 transition duration-300">Contact Us</a>
                </div>
            </div>
            <!-- Secondary Navbar items -->
            <div class="hidden md:flex items-center space-x-3 ">
                    @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</button>
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
                    <a class="text-sm font-bold {{ request()->is('register') ? 'text-blue-500' : '' }}"href="/register">Register</a>
                    <a href="/login" class="ml-6 text-sm font-bold  {{ request()->is('login') ? 'text-blue-500' : '' }}">Log In</a>
                @endauth
                

                <!-- <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a> -->
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
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
            </div>
        </div>
    </div>
    <!-- mobile menu -->
    <div class="hidden mobile-menu">
        <ul class="">
            <li class="active"><a href="index.html" class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Home</a></li>
            <li><a href="#services" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Services</a></li>
            <li><a href="#about" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">About</a></li>
            <li><a href="#contact" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Contact Us</a></li>
        </ul>
    </div>
    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
</nav>