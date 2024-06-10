@props(['name', 'label', 'value' => ''])

<div class="mt-4">
    <label class="block">
        <x-form-label :label="$label" />

        <textarea
            name="{{ $name }}"
            {!! $attributes->merge(['class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' . ($label ? ' mt-1' : '')]) !!}
        >{{ old($name, $value) }}</textarea>
    </label>

    @error($name)
        <x-form-errors :name="$name" />
    @enderror
</div>
