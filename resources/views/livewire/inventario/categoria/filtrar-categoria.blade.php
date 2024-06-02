<div class="bg-gray-600 p-4 flex flex-row justify-end">
    <form class="w-full sm:w-1/2 sm:mb-0" novalidate>
        {{-- @csrf --}}

        <div >
            <x-text-input
                id="filtrar_categoria"
                class="block mt-1 w-full"
                type="text"
                wire:model.live.debounce.300ms="filtrar_categoria"
                :value="old('filtrar_categoria')"
                placeholder="Filtrar Categorías" />
        </div>
    </form>
</div>