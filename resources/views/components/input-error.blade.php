@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm bg-red-200 border-l-4 border-red-600 text-red-600 font-bold space-y-1 p-2']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
