<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-red-500 border border-gray-300 rounded-md
                                                        font-semibold text-xs text-gray-300 uppercase tracking-widest shadow-sm
                                                        hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-400
                                                        focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
