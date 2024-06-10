@props(['name', 'label' => '', 'type' => 'text', 'value' => ''])

<div class="{{ $type === 'hidden' ? 'hidden' : 'mt-4' }}">
    <label class="block">
        <x-form-label :label="$label" />

        <input {!! $attributes->merge([
            'class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ' . ($label ? 'mt-1' : '')
        ]) !!}
            value="{{ old($name, $value) }}"
            name="{{ $name }}"
            type="{{ $type }}" />
    </label>

    @error($name)
        <x-form-errors :name="$name" />
    @enderror
</div>
