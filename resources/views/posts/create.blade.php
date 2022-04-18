<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>
        <x-panel class="">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title"/>

                <x-form.input name="slug" />
                
                <x-form.input name="thumbnail" type="file" />
                
                <x-form.textarea name="excerpt" />

                <x-form.textarea name="body" />

                <x-form.field>

                    <x-form.label name="category" />

                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    <x-form.error name="category" />

                </x-form.field>

                <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                    <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-200">Publish</button>
                </div>
            </form>
        </x-panel>
    </section>
</x-layout>