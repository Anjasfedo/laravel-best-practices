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
                    <x-form method="PUT" action="{{ route('articles.update', $article->id) }}">

                        <x-form-input name="title" label="Title" type="text" :value="$article->title" />

                        <x-form-input name="description" label="Description" type="text" :value="$article->description" />

                        <x-form-textarea name="body" label="Body" :value="$article->body"></x-form-textarea>

                        <div class="mt-4">
                            <x-primary-button type="submit">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </x-form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
