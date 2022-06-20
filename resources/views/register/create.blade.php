<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Register!</h1>

                <form class="mt-10" method="POST" action="/register" enctype="multipart/form-data">
                    @csrf

                    <x-form.input name="name" />
                    <x-form.input name="picture" type="file" />
                    <x-form.input name="username" />
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />
                    <div class="mt-6">
                        <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>