<div>
    <label class="inline-flex items-center">
        <input {!! $attributes->merge(['class' => 'rounded-full border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}
            type="radio"
            name="{{ $name }}"
            value="{{ $value }}"
            {{ $checked ? 'checked' : '' }}
        />

        <span class="ml-2">{{ $label }}</span>
    </label>

    @error($name)
        <x-form-errors :name="$name" />
    @enderror
</div>
