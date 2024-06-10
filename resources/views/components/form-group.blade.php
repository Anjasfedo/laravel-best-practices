<div {!! $attributes->merge(['class' => 'mt-4']) !!}>
    @if(isset($label))
        <x-form-label :label="$label" />
    @endif

    <div class="{{ isset($label) ? 'mt-2' : '' }} {{ isset($inline) && $inline ? 'flex flex-wrap space-x-6' : '' }}">
        {!! $slot !!}
    </div>

    @error($name)
        <x-form-errors :name="$name" />
    @enderror
</div>
