<x-layout>
    <x-setting heading="Manage Post">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mb-5">

                    @if($posts->count())
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <thead class="bg-gray-20">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                    </tr>
                                </thead>

                                <!-- for toggle -->
                                <!-- <div x-data="{ show: false}">
                                                <button  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-80"
                                                  @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'bg-green-100': show }" x-text="show ? 'Published' : 'Draft'"></button>
                                </div> -->

                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/posts/{{ $post->slug }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-wrap">
                                            @if($post->status == 'Published')

                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-80">
                                                    {{ $post->status }}
                                                </span>

                                            @else

                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-80">
                                                    {{ $post->status }}
                                                </span>

                                            @endif
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="/admin/posts/{{ $post->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-xs text-gray-400">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    @else

                        <h2>No post yet. Create now!</h2>

                    @endif
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>