<!doctype html>

<title>My Blog</title>

<head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script
        type="text/javascript"
        src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js'
        referrerpolicy="origin">
    </script>
    <style>

        html
        {
            scroll-behavior: smooth;
        }

        html, body{

            height: 100%;
        }

        [x-cloak] { 
            display: none !important;
        }

    </style>

    @livewireStyles

</head>

<body style="font-family: Open Sans, sans-serif">

    <section class="flex flex-col h-full py-6">

        @include('nav')

         {{ $slot }}
    

        <!-- <footer id="newsletter" class="bg-blue-100 border border-black border-opacity-5 mt-auto"> -->

            <!-- <div class=" py-16 px-10">
                <h5 class="text-3xl">Stay in touch with the latest posts</h5>
                <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

                <div class="mt-10">
                    <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                        <form method="POST" action="/newsletter" class="lg:flex text-sm">
                            @csrf
                            <div class="lg:py-3 lg:px-5 flex items-center">
                                <label for="email" class="hidden lg:inline-block">
                                    <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                                </label>

                                <input id="email" type="text" name="email" placeholder="Your email address"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                                @error('email')

                                    <p class="text-red-500">{{ $message }}</p>

                                @enderror
                            </div>

                            <button type="submit"
                                    class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                            >
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div> -->

        <!-- <div class="flex justify-center py-8 px-10">
            <span>github</span>
            <span>stackoverflow</span>
            <span>linkedn</span>
        </div>

        </footer> -->
    </section>

    <x-notification></x-notification>

    <script src="{{ asset('js/tinymce.js') }}"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js"></script>
    @livewireScripts
    
</body>
