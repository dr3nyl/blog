@props(['category', 'post', 'name'])

@if(isset($category))
    <a href="/?category={{ $category->slug }}"
        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
        style="font-size: 10px">{{ $category->name }}
    </a>
@else

    @if ($name == 'Follow')
        <button
            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs font-semibold"
            style="font-size: 10px"
            name="user_id"
            value="{{ $post->author->id }}">{{ $name }}
        </button>
    @else
        <button
            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs font-semibold"
            style="font-size: 10px"
            name="user_id">{{ $name }}
        </button>
    @endif

@endif
