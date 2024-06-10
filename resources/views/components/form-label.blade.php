@props(['label'])

@if ($label)
    <span {!! $attributes->merge(['class' => 'text-gray-700 dark:text-gray-50']) !!}>{{ $label }}</span>
@endif
