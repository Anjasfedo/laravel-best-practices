<div class="mt-4">
    <label class="block">
        <x-form-label :label="$label" />

        <select
            name="{{ $name }}"
            {!! $attributes->merge([
                'class' => ($label ? 'mt-1 ' : '') . 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            ]) !!}
            @if($multiple)
                multiple
            @endif
            @if($placeholder)
                placeholder="{{ $placeholder }}"
            @endif
            >
            @if($placeholder)
                <option value="" disabled @if(!$value) selected @endif>
                    {{ $placeholder }}
                </option>
            @endif

            @foreach($options as $key => $option)
                <option value="{{ $key }}" @if(in_array($key, (array) $value)) selected @endif>
                    {{ $option }}
                </option>
            @endforeach

            @empty($options)
                {!! $slot !!}
            @endempty
        </select>
    </label>

    @error($name)
        <x-form-errors :name="$name" />
    @enderror
</div>
