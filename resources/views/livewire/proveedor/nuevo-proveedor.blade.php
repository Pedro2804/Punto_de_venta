<div>
    <div class="p-4">
        <h2 class="text-white bg-orange-400 text-center font-bold p-2 text-xl rounded-xl">
            {{__('New :name', ['name' => 'proveedor'])}}
        </h2>
        <form wire:submit.prevent='nuevoProveedor' novalidate>
            @csrf
    
            <!-- Name -->
            <div class="flex flex-col sm:flex-row mt-4">
                <div class="w-full sm:w-1/2 sm-4 sm:mb-0">
                    <x-input-label class="text-white" for="name" :value="__('Empresa').'*'" />
                    <x-text-input
                        id="empresa"
                        class="block mt-1 w-full"
                        type="text"
                        wire:model="empresa"
                        :value="old('empresa')"
                        placeholder="Nombre de la empresa" />
                    <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
                </div>
                <div class="w-full sm:w-1/2 sm:ms-2 sm:mt-0 mt-4">
                    <x-input-label class="text-white" for="representante" :value="__('Representante').'*'" />
                    <x-text-input
                        id="representante"
                        class="block mt-1 w-full"
                        type="text"
                        wire:model="representante"
                        :value="old('representante')"
                        placeholder="Nombre del representante" />
                    <x-input-error :messages="$errors->get('representante')" class="mt-2" />
                </div>
            </div>

            <!-- Contacto -->
            <div class="flex flex-col sm:flex-row mt-4">
                <div class="w-full sm:w-1/2 sm-4 sm:mb-0">
                    <x-input-label class="text-white" for="correo" :value="__('Email Address')" />
                    <x-text-input
                        id="correo"
                        class="block mt-1 w-full"
                        type="text"
                        wire:model="correo"
                        :value="old('correo')"
                        placeholder="{{__('Email Address')}}" />
                    <x-input-error :messages="$errors->get('correo')" class="mt-2" />
                </div>
                <div class="w-full sm:w-1/2 sm:ms-2 sm:mt-0 mt-4">
                    <x-input-label class="text-white" for="telefono" :value="__('Phone')" />
                    <x-text-input
                        id="telefono"
                        class="block mt-1 w-full"
                        type="text"
                        maxlength="10"
                        wire:model="telefono"
                        :value="old('telefono')"
                        placeholder="{{__('Phone')}}" />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>
            </div>
    
            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="direccion" class="text-white" :value="__('Address')" />
                <textarea
                    wire:model="direccion"
                    id="direccion"
                    class="block mt-1 w-full h-20 border-black text-gray-700 bg-orange-100
                        focus:border-orange-700 focus:ring-orange-400 rounded-md shadow-sm"
                    placeholder="{{__('Address')}}"></textarea>
                <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
            </div>

            <div class="flex flex-col sm:flex-row mt-4 justify-center">
                <x-primary-button
                    class="w-full sm:w-auto sm-4 sm:mb-0
                            justify-center bg-orange-600 text-white hover:bg-orange-400 ">
                    {{ __('Save') }}
                </x-primary-button>
                <x-secondary-button x-on:click="$dispatch('close-modal', 'nuevo-proveedor')" class="w-full sm:w-auto sm:ms-2 sm:mt-0 mt-4 justify-center">
                    {{ __('Cancel') }}
                </x-secondary-button>
            </div>
        </form>
    </div>
</div>