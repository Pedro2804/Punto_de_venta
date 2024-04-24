<button {{ $attributes->merge(['type' => 'submit', 'class' =>
    'inline-flex px-4 py-2 bg-orange-200 border border-orange-500
    rounded-md font-semibold text-xs text-orange-500 uppercase tracking-widest
    hover:bg-orange-500 hover:text-white focus:bg-orange-500 focus:text-white
    active:bg-orange-400
    focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2
    transition ease-in-out duration-150']) }}>
{{ $slot }}
</button>
