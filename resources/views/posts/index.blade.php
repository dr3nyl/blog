<x-layout>

        @include('posts._header')

        <div class="flex">
            

            <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

                @if( $posts->count() )
                    
                    <x-posts-grid :posts="$posts"></x-posts-grid>

                    {{ $posts->links() }}

                @else

                    <p class="text-center">No post yet. Please come back later</p>

                @endif

            </main>

            <div class="flex flex-col h-auto mr-10">

                <div class="flex flex-col bg-gray-100 pb-6 max-w-xs text-center font-mono border rounded-lg">
                    <div class="bg-red-200 p-3">
                        <h1 class="text-normal text-lg ">Insert Image here  </h1>
                    </div>

                    <div class="bg-yellow-200 content-center px-7 py-4">

                        <h1 class="font-bold text-md mb-3">Drenyl Pomarejo</h1>
                        <span class="text-sm">I am a Full Stack Web Developer from the Philippines trying to make the world a better place using Laravel, VueJS and a little bit of Tailwind CSS. I also love playing video games during my free time.

                                            I created this site to be a repository of my mental soundbites. Hopefully, I am able to impart a little bit of knowledge about tech, web development, gaming, career and life in general to my readers through this site.
                        </span>
                    </div>
                </div>

                    <div class="flex flex-col max-w-xs text-center font-mono border rounded-lg mt-5">
                        <div class="bg-blue-200 p-3">
                            <h1 class="text-normal text-lg ">Latest Articles from <strong>{{ ucfirst($articleTitle) }}</strong> </h1>
                        </div>


                        <div class=" content-center px-7 py-4">
                            <ul class="text-xs">

                                @foreach($articles as $article)

                                    @if($loop->iteration == 11)

                                        @break

                                    @endif

                                    <li class="mb-4 text-blue-500 hover:text-blue-700 text-justify">
                                        <a href="{{ $article->url }}" target="_blank">{{ $article->title }}</a> 
                                        <span class="text-gray-500 italic"> by {{ $article->author }} of <strong>{{ $article->source->name }}</strong></span>
                                    </li>

                                @endforeach

                            </ul>
                        
                        </div>
                    </div>

            </div>

        </div>
        

</x-layout>