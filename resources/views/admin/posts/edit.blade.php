<x-layout>
    <x-setting heading="Edit Post: {{ $post->title }}">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
                <x-form.input name="title" :value="old('title', $post->title)" />

                <x-form.input name="slug" :value="old('slug', $post->slug)" />

                <x-form.field>
                    <x-form.label name="author" />

                    <select class="form-select
                                    block
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                name="user_id" 
                                id="user_id">
                        @foreach (\App\Models\User::all() as $user)
                            <option
                                value="{{ $user->id }}"
                                {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}
                            >{{ ucwords($user->name) }}</option>
                        @endforeach
                    </select>

                    <x-form.error name="author"/>
                </x-form.field>


                <x-form.field>
                    <x-form.label name="status" />

                    <select class="form-select
                                    block
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    name="status" 
                                    id="status">
                        <option value="Draft" {{ old('status', $post->status) == 'Draft' ? 'selected' : '' }} >Draft</option>
                        <option value="Published" {{ old('status', $post->status) == 'Published' ? 'selected' : '' }}>Published</option>
                    </select>

                    <x-form.error name="status"/>
                </x-form.field>

                <div class="flex mt-6">

                    <div class="flex-1">
                        <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail )" />  
                    </div>

                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">

                </div>

                <x-form.textarea name="excerpt" > {{ old('excerpt', $post->excerpt) }}</x-form.textarea>

                <x-form.textarea name="body" > {{ old('body', $post->body) }}</x-form.textarea>

                <x-form.field>
                    <x-form.label name="category" />

                    <select class="form-select
                                    block
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    name="category_id" 
                                    id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    <x-form.error name="category"/>
                </x-form.field>

                <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                    <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-200">Update</button>
                </div>
        </form>
    </x-setting>
</x-layout>