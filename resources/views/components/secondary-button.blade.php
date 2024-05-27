<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-red-500 rounded-md
                                                        font-semibold text-xs text-red-500 uppercase tracking-widest shadow-sm
                                                        hover:bg-red-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500
                                                        focus:ring-offset-1 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
