<button {{ $attributes->merge(['type' => 'submit', 'class' =>
    'inline-flex items-center px-4 py-2 bg-gray-800 border border-orange-500 rounded-md
                                                        font-semibold text-xs text-orange-400 uppercase tracking-widest shadow-sm
                                                        hover:bg-orange-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-orange-500
                                                        focus:ring-offset-1 disabled:opacity-25 transition ease-in-out duration-150']) }}>
{{ $slot }}
</button>
