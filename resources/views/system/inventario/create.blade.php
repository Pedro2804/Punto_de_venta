<div>
    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md
                    text-white bg-orange-400 hover:text-black hover:bg-orange-500 hover:border-black
                    focus:outline-none transition ease-in-out duration-150 ms-4"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'nuevo-producto')" >
        <div>{{ __('New')}}</div>

        <div class="ms-1">
            <x-icons :src="asset('img/plus.svg')" class="h-5" />
        </div>
    </button>

    <x-modal name="nuevo-producto" focusable>
        <livewire:inventario.nuevo-producto>
    </x-modal>
</div>
