@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block text-base font-medium text-gray-800 focus:outline-none focus:text-gray-800'
            : 'block text-base text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
