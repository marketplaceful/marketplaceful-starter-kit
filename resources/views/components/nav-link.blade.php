@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center border-indigo-400 text-base font-medium leading-6 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center border-transparent text-base font-medium leading-6 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
