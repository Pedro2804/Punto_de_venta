@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-orange-500 text-start text-base font-medium text-black bg-orange-200
                focus:outline-none focus:text-orange-100 focus:bg-orange-400 focus:border-orange-300 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-black hover:text-orange-100
                hover:bg-orange-400 hover:border-orange-300 focus:outline-none focus:text-orange-100 focus:bg-orange-400
                focus:border-orange-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

