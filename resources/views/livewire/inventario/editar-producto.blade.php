<div class="p-4">
    <h2 class="text-white bg-orange-400 text-center font-bold p-2 text-xl rounded-xl">
        {{__('Edit :name', ['name' => 'producto'])}}
    </h2>
    <form wire:submit.prevent='editarProducto' novalidate>
        @csrf

        <!-- Name -->
        <div class="flex flex-col sm:flex-row mt-4">
            <div class="w-full sm:w-1/2 sm-4 sm:mb-0">
                <x-input-label class="text-white" for="name" :value="__('Name').' del producto'" />
                <x-text-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    wire:model="name"
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
                    wire:model="sku"
                    :value="old('sku')"
                    placeholder="Código del producto" />
                <x-input-error :messages="$errors->get('sku')" class="mt-2" />
            </div>
        </div>

        <!-- Category -->
        <div class="flex flex-col sm:flex-row mt-4">
            <div class="w-full sm:w-2/3 sm-4 sm:mb-0">
                <x-input-label class="text-white" for="categoria_id" :value="__('Category')" />
                <x-text-input
                    id="categoria_id"
                    class="block mt-1 w-full"
                    type="text"
                    wire:model="categoria_id"
                    :value="old('categoria_id')"
                    x-on:input="$dispatch('buscarCategoria')"
                    list="options_cat"
                    placeholder="{{__('Category')}}" />
                
                <datalist id="options_cat">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                    @endforeach
                </datalist>

                <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
            </div>
            <div class="w-full sm:w-1/3 sm:ms-2 sm:mt-0 mt-4">
                <x-input-label class="text-white" for="nameCategoria" :value="'Nombre de la categoria'" />
                <x-text-input
                    id="nameCategoria"
                    class="block mt-1 w-full cursor-default"
                    type="text"
                    wire:model="nameCategoria"
                    :value="old('nameCategoria')"
                    placeholder="Nombre de la categoria"
                    readonly />
                <x-input-error :messages="$errors->get('nameCategoria')" class="mt-2" />
            </div>
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="descripcion" class="text-white" :value="__('Description')" />
            <textarea
                wire:model="descripcion"
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
                        type="number"
                        wire:model="precio_compra"
                        x-on:input="$dispatch('calcularPrecio')"
                        :value="0"
                        min="0"
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
                        type="number"
                        wire:model="precio_venta"
                        x-on:input="$dispatch('calcularPrecio')"
                        :value="old('precio_venta')"
                        min="0"
                        placeholder="Precio de venta" />
                    <x-input-error :messages="$errors->get('precio_venta')" class="mt-2" />
                </div>
            </div>
            <div class="w-full sm:w-1/3 sm:ms-2 sm:mt-0 mt-4">
                <div>
                    <x-input-label class="text-white" for="ganancia" :value="'Ganancia'" />
                    <x-text-input
                        id="ganancia"
                        class="block mt-1 w-full cursor-default"
                        type="number"
                        wire:model="ganancia"
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
                    wire:model="stock"
                    :value="old('stock')"
                    min="0"
                    placeholder="{{__('Stock')}}" />
                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
            </div>
            <div class="w-full sm:w-1/2 sm:ms-2 sm:mt-0 mt-4">
                <x-input-label class="text-white"  for="stock_min" :value="__('Stock mínimo')" />
                <x-text-input
                    id="stock_min"
                    class="block mt-1 w-full"
                    type="number"
                    wire:model="stock_min"
                    :value="old('stock_min')"
                    min="10"
                    placeholder="{{__('Stock mínimo')}}" />
                <x-input-error :messages="$errors->get('stock_min')" class="mt-2" />
            </div>
        </div>

        <!-- Proveedor -->
        <div class="flex flex-col sm:flex-row mt-4">
            <div class="w-full sm:w-2/3 sm-4 sm:mb-0">
                <x-input-label class="text-white" for="proveedor_id" :value="__('Proveedor')" />
                <x-text-input
                    id="proveedor_id"
                    class="block mt-1 w-full"
                    type="text"
                    wire:model="proveedor_id"
                    :value="old('proveedor_id')"
                    x-on:input="$dispatch('buscarProveedor')"
                    list="options_prov"
                    placeholder="{{__('Proveedor')}}" />
                
                <datalist id="options_prov">
                    @foreach ($proveedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->empresa}}</option>
                    @endforeach
                </datalist>

                <x-input-error :messages="$errors->get('proveedor_id')" class="mt-2" />
            </div>
            <div class="w-full sm:w-1/3 sm:ms-2 sm:mt-0 mt-4">
                <x-input-label class="text-white" for="nameProveedor" :value="'Empresa'" />
                <x-text-input
                    id="nameProveedor"
                    class="block mt-1 w-full cursor-default"
                    type="text"
                    wire:model="nameProveedor"
                    :value="old('nameProveedor')"
                    placeholder="Empresa"
                    readonly />
                <x-input-error :messages="$errors->get('nameProveedor')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4">
            <x-input-label class="text-white" for="imagen_nueva" :value="__('Image')" />
            <x-text-input id="imagen_nueva" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" accept="image/*"/>

            <div class="my-5 w-80">
                <x-input-label :value="__('Image').' actual'" class="text-white"/>
                @if ($imagen)
                    <img src="{{asset('storage/img/productos').'/'.$imagen}}" alt="" class="text-white" />
                @endif
            </div>

            <div class="my-5 w-80">
                @if ($imagen_nueva)
                    <x-input-label :value="__('Image').' nueva'" class="text-white"/>
                    <img src="{{$imagen_nueva->temporaryUrl()}}" alt="">
                @endif
            </div>
            <x-input-error :messages="$errors->get('imagen_nueva')" class="mt-2" />
        </div>

        <div class="flex flex-col sm:flex-row mt-4 justify-center">
            <x-primary-button
                class="w-full sm:w-auto sm-4 sm:mb-0
                        justify-center bg-orange-600 text-white hover:bg-orange-400 ">
                {{ __('Save') }}
            </x-primary-button>
            <x-secondary-button x-on:click="$dispatch('cerrarModal')" class="w-full sm:w-auto sm:ms-2 sm:mt-0 mt-4 justify-center">
                {{ __('Cancel') }}
            </x-secondary-button>
        </div>
    </form>
</div>
