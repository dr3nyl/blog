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
                    <div class="bg-blue-400 p-3">
                        <h1 class="text-normal text-lg text-white"><strong>{{ ucfirst($articleTitle) }}</strong> news today </h1>
                    </div>


                    <div class=" content-center px-7 py-4">
                        <ul class="text-xs">

                            @foreach($articles as $article)

                                @if($loop->iteration == 11)

                                    @break

                                @endif

                                <li class="mb-4 text-blue-500 hover:text-blue-700 text-justify">
                                    <a href="{{ $article->url }}" target="_blank">{{ $article->title }}</a> 
                                </li>

                            @endforeach

                        </ul>
                    
                    </div>
                </div>

                <div class="flex flex-col w-72 text-center border rounded-lg mt-5">
                    <div class="bg-blue-400 p-3">
                        <h1 class="text-normal text-lg text-white">My Bookmark</strong> </h1>
                    </div>


                    <div class=" content-center px-7 py-4">
                        <!-- <ul class="text-xs">

                            @foreach($articles as $article)

                                @if($loop->iteration == 11)

                                    @break

                                @endif

                                <li class="mb-4 text-blue-500 hover:text-blue-700 text-justify">
                                    <a href="{{ $article->url }}" target="_blank">{{ $article->title }}</a> 
                                </li>

                            @endforeach

                        </ul> -->
                    
                    </div>
                </div>

            </div>

        </div>
        

</x-layout>