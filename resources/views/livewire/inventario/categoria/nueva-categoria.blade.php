<div class="px-4">
    <form class="space-y-4" wire:submit.prevent='nuevaCategoria' novalidate>
        {{-- @csrf --}}

        <div class="flex flex-col sm:flex-row">
            <div class="w-full sm:w-2/3 sm:mb-0">
                <x-input-label class="text-white" for="categoria" :value="__('Category')" />
                <x-text-input
                    id="nueva_categoria"
                    class="block mt-1 w-full"
                    type="text"
                    wire:model="nueva_categoria"
                    :value="old('nueva_categoria')"
                    placeholder="Nueva categoría" />
                <x-input-error :messages="$errors->get('nueva_categoria')" class="mt-2" />
            </div>
            <div class="w-full sm:w-1/3 sm:ms-2 mt-4 flex items-center">
                <x-primary-button
                    class="w-full justify-center items-center bg-orange-600 text-white hover:bg-orange-400 ">
                    {{ __('Save') }}
                    <x-icons
                    class="h-5 ms-1"
                    :src="asset('img/save2.svg')" />
                </x-primary-button>
            </div>
        </div>
    </form>
</div>
