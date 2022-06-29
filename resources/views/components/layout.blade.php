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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <style>

        html{
            scroll-behavior: smooth;
        }

        html, body{

            height: 100%;
        }

        /* prevent flickering of hidden elements from alpine */
        [x-cloak] { 
            display: none !important;
        }

        .fab{
            color: white;
        }

    </style>

@livewireStyles
</head>

<body class="font-sans">

    <section class="flex flex-col h-full mt-8">

        @include('nav')

         {{ $slot }}
    

        <footer id="newsletter" class="bg-gray-900 border border-black border-opacity-5 mt-auto">

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

        <div class="flex flex-col footer items-center mt-2 px-10 py-6">
            <div class="mb-4">
                <a href="https://github.com/dr3nyl" target="__blank"><i class="fab fa-2x fa-github px-3"></i></a>
                <a href="https://stackoverflow.com/users/5304955/drenyl" target="__blank"><i class="fab fa-2x fa-stack-overflow px-3"></i></a>
                <a href="https://www.linkedin.com/in/drenyl-pomarejo/" target="__blank"><i class="fab fa-2x fa-linkedin-in px-3"></i></a>
            </div>
            <div class="flex text-white">
                <div class="text-xl">Copyright {{ date('Y') }}. All rights reserved</div>

            </div>
        </div>

        </footer>
    </section>

    <x-notification></x-notification>

    <script src="{{ asset('js/tinymce.js') }}"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js"></script>
    
    @livewireScripts

</body>
