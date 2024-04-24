@php
    $classes="block fill-current text-white";
@endphp
<div>
    <img {{$attributes->merge(['class' => $classes])}}>
</div>