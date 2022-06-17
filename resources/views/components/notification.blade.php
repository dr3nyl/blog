
@if(session()->has('success'))
    <div 
        x-data="{ open: true }"
        x-show="open" 
        x-init="setTimeout(() => open = false, 4000)"
        class="bg-green-100 border fixed flex justify-between max-w-fit mx-2 my-12 p-12 py-5 right-0 rounded-xl shadow-lg sm:mx-6 bottom-0 w-fit z-20">
            
        <div>
            <!-- <svg  class="text-green-300 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg> -->
            </div>
            <div>
                <h1>{{ session('success') }}</h1>
            </div>
    
            <button @click="open = false" class="hover:text-gray-500 ml-5 text-gray-400">
            <svg class="h-5 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif

