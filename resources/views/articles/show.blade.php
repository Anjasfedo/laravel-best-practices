<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(request()->route()->getName()) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <h3 class="text-lg font-medium">{{ $article->title }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $article->description }}</p>
                    </div>

                    <x-show-file :fileUrl="$article->image_url" :label="'Article Image'" />

                    <div class="mt-4">
                        <p class="text-base text-gray-700 dark:text-gray-300">{{ $article->body }}</p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('articles.edit', $article->id) }}"
                            class="text-blue-500 dark:text-blue-400 hover:underline">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <input id="article" type="hidden" value='@json($article->id)'>
        <script>
            let article = $('#article').val();
            console.log(article);
        </script> --}}
    </div>
</x-app-layout>
