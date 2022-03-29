@if( session()->has('success') )

    <div class="text-red-800">
        <p>{{ session('success') }}</p>
    </div>

@endif