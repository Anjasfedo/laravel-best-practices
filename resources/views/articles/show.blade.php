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

                    <div class="mt-4">
                        @if ($article->image)
                            <img src="{{ asset($article->image) }}" alt="Article Image" class="h-64 w-auto object-cover">
                        @else
                            <span class="text-gray-400">No image uploaded</span>
                        @endif
                    </div>

                    <div class="mt-4">
                        <p class="text-base text-gray-700 dark:text-gray-300">{{ $article->body }}</p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-500 dark:text-blue-400 hover:underline">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
