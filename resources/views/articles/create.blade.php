<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-form method="POST" action="{{ route('articles.store') }}">
                        @csrf

                        <x-form-input name="title" label="Title" type="text" />

                        <x-form-input name="slug" label="Slug" type="text" />

                        <x-form-input name="description" label="Description" type="text" />

                        <x-form-textarea name="body" label="Body"></x-form-textarea>

                        <x-form-input name="user_id" type="hidden" :value="auth()->id()" />

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
