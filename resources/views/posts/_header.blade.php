<header class="max-w-xl mx-auto mt-20 text-center mb-10">
    <h1 class="text-4xl mb-5">
        Latest <span class="text-blue-500"></span> Post
    </h1>

    <div class="flex space-y-0 space-x-4 mt-6">
        <!--  Category -->
        <div class=" py-1 bg-gray-100 rounded-xl">

            <x-category-dropdown/>
            
                
        </div>
        <div class=" items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="">

                @if( request('category') )

                    <input type="hidden" name="category" value="{{ request('category') }}">
                
                @endif
                
                    <input type="text" 
                            name="search" 
                            placeholder="Search here"    
                            class="bg-transparent placeholder-black font-semibold text-sm"
                            
                            @if(request('search')) 
                                value=" {{ request('search') }}"
                             @else
                                value=""
                            @endif
                     >
            </form>
        </div>
    </div>
</header>