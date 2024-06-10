<!-- resources/views/components/form.blade.php -->
@props(['action', 'method', 'submitButtonText'])

<form method="POST" action="{{ $action }}" @if($method !== 'POST') {{ 'PUT' }} @endif>
    @csrf
    @if($method !== 'POST')
        @method('PUT')
    @endif

    <!-- Title Field -->
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Title</label>
        <input type="text" name="title" id="title" class="form-input" value="{{ old('title') }}">
        @error('title')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description Field -->
    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
        <input type="text" name="description" id="description" class="form-input" value="{{ old('description') }}">
        @error('description')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <!-- Body Field -->
    <div class="mb-4">
        <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Body</label>
        <textarea name="body" id="body" rows="5" class="form-input">{{ old('body') }}</textarea>
        @error('body')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <div class="flex items-center justify-end mt-4">
        <x-secondary-button class="ml-4" type="submit">
            {{ $submitButtonText ?? __('Submit') }}
        </x-secondary-button>
    </div>
</form>
