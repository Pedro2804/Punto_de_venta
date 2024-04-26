<div class="bg-gray-600 p-4 flex flex-row justify-end">
    <form class="w-full sm:w-1/2 sm:mb-0" wire:submit.prevent='datosAfiltrar' novalidate>
        @csrf

        <div >
            <x-text-input
                id="buscarCategoria"
                class="block mt-1 w-full"
                type="text"
                wire:model="categoria"
                x-on:input="$dispatch('filtrarEntrada')"
                :value="old('buscarCategoria')"
                placeholder="Filtrar Categorías" />
            <x-input-error :messages="$errors->get('buscarCategoria')" class="mt-2" />
        </div>
    </form>
</div>
