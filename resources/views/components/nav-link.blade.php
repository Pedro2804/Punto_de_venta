@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-orange-400 text-sm font-semibold leading-5 text-black focus:outline-none
                focus:border-orange-500 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-sm font-semibold leading-5 text-black hover:text-gray-500
                hover:border-orange-400 hover:bg-orange-200 focus:outline-none focus:text-gray-500 focus:border-gray-500 transition
                duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>