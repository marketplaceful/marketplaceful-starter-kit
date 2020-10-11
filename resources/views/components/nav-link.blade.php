@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-medium text-gray-800 focus:outline-none focus:text-gray-800'
            : 'text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
