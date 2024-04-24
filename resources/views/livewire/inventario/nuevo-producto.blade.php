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
        <div class="p-4">
            <h2 class="text-white bg-orange-400 text-center font-bold p-2 text-xl rounded-xl">
                {{__('New :name', ['name' => 'producto'])}}
            </h2>
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
        
                <!-- Name -->
                <div class="flex flex-col sm:flex-row mt-4">
                    <div class="w-full sm:w-1/2 sm-4 sm:mb-0">
                        <x-input-label class="text-white" for="name" :value="__('Name').' del producto'" />
                        <x-text-input
                            id="name"
                            class="block mt-1 w-full"
                            type="text"
                            name="name"
                            :value="old('name')"
                            placeholder="Nombre del producto" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="w-full sm:w-1/2 sm:ms-2 sm:mt-0 mt-4">
                        <x-input-label class="text-white" for="sku" :value="__('SKU').' del producto'" />
                        <x-text-input
                            id="sku"
                            class="block mt-1 w-full"
                            type="text"
                            name="sku"
                            :value="old('sku')"
                            placeholder="Código del producto" />
                        <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                    </div>
                </div>

                <!-- Category -->
                <div class="mt-4">
                    <x-input-label class="text-white" for="categoria" :value="__('Category')" />
                    <x-text-input
                        id="categoria"
                        class="block mt-1 w-full"
                        type="text"
                        name="categoria"
                        :value="old('categoria')"
                        list="options_cat"
                        placeholder="{{__('Category')}}" />
                  
                    <datalist id="options_cat">
                        <option value="Herramientas"></option>
                        <option value="Tuercas"></option>
                        <option value="Tubos"></option>
                        <!-- Agrega más opciones según sea necesario -->
                    </datalist>

                    <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
                </div>
        
                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="descripcion" class="text-white" :value="__('Description')" />
                    <textarea
                        name="descripcion"
                        id="descripcion"
                        class="block mt-1 w-full h-20 border-black text-gray-700 bg-orange-100
                            focus:border-orange-700 focus:ring-orange-400 rounded-md shadow-sm"
                        placeholder="{{__('Description'). ' del producto'}}"></textarea>
                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                </div>
                    
                <!--Precio-->
                <div class="flex flex-col sm:flex-row mt-4 border border-orange-500 sm:border-none sm:p-0 p-4 rounded-xl sm:rounded-none">
                    <div class="w-full sm:w-1/3 sm-4 sm:mb-0">
                        <div>
                            <x-input-label class="text-white" for="precio_compra" :value="'Precio de compra'" />
                            <x-text-input
                                id="precio_compra"
                                class="block mt-1 w-full"
                                type="text"
                                name="precio_compra"
                                :value="old('precio_compra')"
                                placeholder="Precio de compra" />
                            <x-input-error :messages="$errors->get('precio_compra')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-full sm:w-1/3 sm:ms-2 sm:mt-0 mt-4">
                        <div>
                            <x-input-label class="text-white" for="precio_venta" :value="'Precio de venta'" />
                            <x-text-input
                                id="precio_venta"
                                class="block mt-1 w-full"
                                type="text"
                                name="precio_venta"
                                :value="old('precio_venta')"
                                placeholder="Precio de venta" />
                            <x-input-error :messages="$errors->get('precio_venta')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-full sm:w-1/3 sm:ms-2 sm:mt-0 mt-4">
                        <div>
                            <x-input-label class="text-white" for="ganancia" :value="'Ganancia'" />
                            <x-text-input
                                id="ganancia"
                                class="block mt-1 w-full"
                                type="text"
                                name="ganancia"
                                :value="old('ganancia')"
                                placeholder="Ganancia"
                                readonly />
                            <x-input-error :messages="$errors->get('Ganancia')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <!-- Stock -->
                <div class="flex flex-col sm:flex-row mt-4">
                    <div class="w-full sm:w-1/2 sm-4 sm:mb-0">
                        <x-input-label class="text-white"  for="stock" :value="__('Stock')" />
                        <x-text-input
                            id="stock"
                            class="block mt-1 w-full"
                            type="number"
                            name="stock"
                            :value="old('stock')"
                            placeholder="{{__('Stock')}}" />
                        <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                    </div>
                    <div class="w-full sm:w-1/2 sm:ms-2 sm:mt-0 mt-4">
                        <x-input-label class="text-white"  for="stock_min" :value="__('Stock mínimo')" />
                        <x-text-input
                            id="stock_min"
                            class="block mt-1 w-full"
                            type="number"
                            name="stock_min"
                            :value="old('20')"
                            placeholder="{{__('Stock mínimo')}}" />
                        <x-input-error :messages="$errors->get('stock_min')" class="mt-2" />
                    </div>
                </div>
        
                <!-- Proveedor -->
                <div class="mt-4">
                    <x-input-label class="text-white" for="proveedor" :value="__('Proveedor')" />
                    <x-text-input
                        id="proveedor"
                        class="block mt-1 w-full"
                        type="text"
                        name="proveedor"
                        :value="old('proveedor')"
                        list="options_prov"
                        placeholder="{{__('Proveedor')}}" />
                  
                    <datalist id="options_prov">
                        <option value="Pepsi"></option>
                        <option value="Coca Cola"></option>
                        <option value="Truper"></option>
                        <!-- Agrega más opciones según sea necesario -->
                    </datalist>

                    <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
                </div>
        
                <div class="flex flex-col sm:flex-row mt-4 justify-center">
                    <x-primary-button
                        class="w-full sm:w-auto sm-4 sm:mb-0
                                justify-center bg-orange-600 text-white hover:bg-orange-400 ">
                        {{ __('Save') }}
                    </x-primary-button>
                    <x-secondary-button x-on:click="$dispatch('close')" class="w-full sm:w-auto sm:ms-2 sm:mt-0 mt-4 justify-center">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                </div>
            </form>
        </div>
    </x-modal>
</div>