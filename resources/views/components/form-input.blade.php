@props(['name', 'label' => '', 'type' => 'text', 'value' => ''])

<div class="{{ $type === 'hidden' ? 'hidden' : 'mt-4' }}">
    <label class="block">
        <x-form-label :label="$label" />

        @if ($type === 'file')
            <input {!! $attributes->merge([
                'class' =>
                    'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-1 ' .
                    ($label ? 'mt-1' : ''),
                'type' => 'file', // Ensure the input type is explicitly set to file
            ]) !!} name="{{ $name }}",>
        @else
            <input {!! $attributes->merge([
                'class' =>
                    'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ' .
                    ($label ? 'mt-1' : ''),
            ]) !!} value="{{ old($name, $value) }}" name="{{ $name }}"
                type="{{ $type }}" />
        @endif
    </label>

    @error($name)
        <x-form-errors :name="$name" />
    @enderror
</div>
