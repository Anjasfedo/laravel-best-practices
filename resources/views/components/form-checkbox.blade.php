<!-- resources/views/components/forms/checkbox.blade.php -->
@props(['name', 'label', 'value' => '', 'checked' => false])

<div class="flex flex-col">
    <label class="flex items-center">
        <input {!! $attributes->merge(['class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50']) !!}
            type="checkbox"
            name="{{ $name }}"
            value="{{ $value }}"
            {{ $checked ? 'checked' : '' }}
        />

        <span class="ml-2">{{ $label }}</span>
    </label>

    @error($name)
        <span class="text-red-600 text-sm">{{ $message }}</span>
    @enderror
</div>
