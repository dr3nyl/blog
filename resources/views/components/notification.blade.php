@if(session()->has('success'))


    <div 
        x-data="{ open: true }"  
        x-show="open" 
        x-init="setTimeout(() => open = false, 4000)" 
        class="z-20 flex justify-between max-w-xs sm:max-w-sm w-3/12 fixed bottom-0 right-0 bg-white rounded-xl shadow-lg border px-4 py-5 mx-2 sm:mx-6 my-8">
            
        <div>
            <svg  class="text-green-300 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            </div>
            <div>
                <h1>Test notification</h1>
            </div>
    
            <button @click="open = false" class="text-gray-400 hover:text-gray-500">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif

