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
                    class="w-full justify-center items-center bg-orange-600 text-white hover:bg-orange-400">
                    {{ __('Save') }}
                    <x-icons
                    class="h-5 ms-1"
                    :src="asset('img/save2.svg')" />
                </x-primary-button>
            </div>
        </div>

        <div class="mx-auto w-[500px] bg-gray-950 rounded-xl overflow-hidden drop-shadow-xl"
             wire:loading wire:target="nuevaCategoria">
            <div class="bg-[#333] flex items-center p-[5px] text-whitec relative">
                <div class="flex absolute left-3">
                    <span class="h-3.5 w-3.5 bg-[#ff605c] rounded-xl mr-2"></span>
                    <span class="h-3.5 w-3.5 bg-[#ffbd44] rounded-xl mr-2"></span>
                    <span class="h-3.5 w-3.5 bg-[#00ca4e] rounded-xl"></span>
                </div>
                <div class="flex-1 text-center text-white">Guardando</div>
            </div>
            <div class="p-2.5 text-[#0f0]">
                <div>
                    <span class="mr-2">Cargando</span>
                    <span class="animate-[ping_1.5s_0.5s_ease-in-out_infinite]">.</span>
                    <span class="animate-[ping_1.5s_0.7s_ease-in-out_infinite]">.</span>
                    <span class="animate-[ping_1.5s_0.9s_ease-in-out_infinite]">.</span>
                </div>
            </div>
        </div>
    </form>
</div>
