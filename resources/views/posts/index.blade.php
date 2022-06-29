<x-layout>

        @include('posts._header')

        <div class="flex mb-12 py-12">
            

            <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

                @if( $posts->count() )
                    
                    <x-posts-grid :posts="$posts"></x-posts-grid>

                    {{ $posts->links() }}

                @else

                    <p class="text-center">No post yet. Please come back later</p>

                @endif

            </main>

            <div class="flex flex-col h-auto mr-10 py-12">

                <div class="flex flex-col w-72 text-center border rounded-lg mt-5">
                    <div class="bg-gray-900 p-3 text-white">
                        <h1 class="text-xl text-white">About Meh</strong> </h1>
                    </div>

                    <div class="content-center px-7 py-4 font-serif">
                        <div class="flex flex-col">
                            <img src="{{ asset('images/mtapo-3.jpg')}}"  alt="" class="rounded-full border-double border-3 border-gray-400 border-4 mb-8">

                            <div class="header">
                                <h1 class="font-semibold text-xl mb-3">Drenyl Pomarejo</h1>
                            </div>

                            <div class="body mb-7">
                                <p class="mb-5">I am a Software Developer in the Philippines working on various projects. I enjoy coding, gaming, hiking, and lift some heavy weights</p>
                            </div>

                            <div class="footer">
                                <form action="" method="post">
                                    @csrf

                                    <button class="border-gray-400 border-2 rounded-md px-4 py-2 hover:bg-gray-900 hover:text-white transition duration-300" type="submit">Read more</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="flex flex-col w-72 text-center border rounded-lg mt-5 ">
                    <div class="bg-gray-900 p-3 text-white">
                        <h1 class="text-normal text-lg text-white"><strong>{{ ucfirst($articleTitle) }}</strong> news today </h1>
                    </div>


                    <div class=" content-center px-7 py-4">
                        <ul class="text-xs">

                            @foreach($articles as $article)

                                @if($loop->iteration == 11)

                                    @break

                                @endif

                                <li class="mb-4 text-black hover:text-blue-700 text-justify">
                                    <a href="{{ $article->url }}" target="_blank">{{ $article->title }}</a> 
                                </li>

                            @endforeach

                        </ul>
                    
                    </div>
                </div>

            </div>

        </div>
        

</x-layout>