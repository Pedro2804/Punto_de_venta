<div class="bg-gray-600 p-4 flex flex-row justify-end">
    <form class="w-full sm:mb-0" wire:submit.prevent='filtrarProductos' novalidate>
        {{-- @csrf --}}

        <h2 class="text-center text-white font-bold text-xl">Filtrar productos</h2>
        <!-- Name -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2">
            <div>
                <x-text-input
                    id="por_categoria"
                    class="block mt-1 w-full"
                    type="text"
                    wire:model="por_categoria"
                    :value="old('por_categoria')"
                    list="options_porCategoria"
                    placeholder="{{__('Por categoría')}}" />
                
                <datalist id="options_porCategoria">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->categoria}}"></option>
                    @endforeach
                </datalist>
            </div>
            <div>
                <x-text-input
                    id="proveedor_id"
                    class="block mt-1 w-full"
                    type="text"
                    wire:model="proveedor_id"
                    :value="old('proveedor_id')"
                    x-on:input="$dispatch('buscarProveedor')"
                    list="options_prov"
                    placeholder="{{__('Por proveedor')}}" />
                
                <datalist id="options_prov">
                    @foreach ($proveedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->empresa}}</option>
                    @endforeach
                </datalist>
            </div>
            <div>
                <x-text-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    wire:model="name"
                    :value="old('name')"
                    placeholder="Por nombre" />
            </div>
            <div>
                <x-text-input
                    id="sku"
                    class="block mt-1 w-full"
                    type="text"
                    wire:model="sku"
                    :value="old('sku')"
                    placeholder="Por código" />
            </div>
        </div>
    </form>
</div>
