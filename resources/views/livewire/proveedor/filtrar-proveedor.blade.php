<div class="bg-gray-600 p-4 flex flex-row justify-end">
    <form class="w-full sm:w-1/2 sm:mb-0" wire:submit.prevent='datosAfiltrar' novalidate>
        @csrf

        <div >
            <x-text-input
                id="buscarProveedor"
                class="block mt-1 w-full"
                type="text"
                wire:model="proveedor"
                x-on:input="$dispatch('filtrarEntrada')"
                :value="old('buscarProveedor')"
                placeholder="Filtrar proveedores" />
            <x-input-error :messages="$errors->get('buscarProveedor')" class="mt-2" />
        </div>
    </form>
</div>
