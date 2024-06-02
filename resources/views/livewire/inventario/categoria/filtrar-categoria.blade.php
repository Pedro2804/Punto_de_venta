<div class="bg-gray-600 p-4">
    <form class="flex"  novalidate>
        {{-- @csrf --}}
        <div class="w-full sm:w-1/2 sm:mb-0" >
            <x-text-input
                id="filtrar_categoria"
                class="block mt-1 w-full"
                type="text"
                wire:model.live.debounce.300ms="filtrar_categoria"
                :value="old('filtrar_categoria')"
                placeholder="Filtrar Categorías" />
        </div>

        <div class="w-full sm:w-1/2 sm:mb-0 text-center" wire:loading wire:target="filtrar_categoria">
            <div
                class="w-16 h-16 border-4 border-dashed rounded-full animate-spin border-yellow-500 mx-auto">
            </div>
            <h2 class="text-zinc-900 dark:text-white mt-4">Cargando...</h2>
        </div>
          
        {{-- <div class="w-full sm:w-1/2 sm:mb-0 text-center" wire:loading wire:target="filtrar_categoria">
            <span class="inline-block border border-blue-500 border-r-transparent motion-safe:animate-spin rounded-full my-2 p-2"></span>
        </div> --}}
    </form>
</div>