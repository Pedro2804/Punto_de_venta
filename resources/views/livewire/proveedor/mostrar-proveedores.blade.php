<div class="text-gray-900">
    <div class="bg-white mb-4 hidden md:flex">
        <div class="bg-gray-200 w-1/4">
            <p class="text-2xl font-bold text-center">
                {{__('Empresa')}}
            </p>
        </div>
        <div class="w-1/4">
            <p class="text-2xl font-bold text-center">
                {{__('Representante')}}
            </p>
        </div>
        <div class="bg-gray-200 w-1/4">
            <p class="text-2xl font-bold text-center">
                {{__('Telefono')}}
            </p>
        </div>
        <div class="w-1/4">
            <p class="text-2xl font-bol text-center">
                {{__('Acciones')}}
            </p>
        </div>
    </div>

    @forelse ( $proveedores as $proveedor)
        <div class="py-2 bg-white border-b border-gray-300 md:flex">
            <div class="md:w-1/4 md:text-center">
                <p class="md:text-lg md:font-semibold md:text-gray-600 text-xl font-bold">
                    {{$proveedor->empresa}}
                </p>
            </div>
            <div class="md:w-1/4 md:text-center">
                <p class="md:text-lg md:font-semibold md:text-gray-600 text-sm text-gray-600">
                    <span class="md:hidden ">
                        Representante: 
                    </span>
                    {{$proveedor->representante}}
                </p>
            </div>
            <div class="md:w-1/4 md:text-center">
                <p class="md:text-lg md:font-semibold md:text-gray-600 text-sm text-gray-500">
                    <span class="md:hidden ">
                        Telefono:
                    </span>
                    {{__($proveedor->telefono !== null ? $proveedor->telefono : 'No registrado')}}
                </p>
            </div>

            <div class="flex flex-col md:flex-row items-stretch md:justify-center gap-3 mt-2 md:mt-0 md:w-1/4">
                <button 
                    wire:click="$dispatch('Editar', {{$proveedor}})"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase flex justify-center items-center
                    cursor-pointer hover:bg-blue-700" >
                    <div>{{ __('Edit')}}</div>

                    <div class="ms-1">
                        <x-icons :src="asset('img/edit.svg')" class="h-5" />
                    </div>
                </button>

                <button 
                    wire:click="$dispatch('Eliminar', {id: {{$proveedor->id}}, empresa: '{{$proveedor->empresa}}'})"
                    class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase flex justify-center items-center
                        cursor-pointer hover:bg-red-500" >
                    <div>{{ __('Delete')}}</div>

                    <div class="ms-1">
                        <x-icons :src="asset('img/delete.svg')" class="h-5" />
                    </div>
                </button>
            </div>
        </div>
    @empty
        <p class="p-3 text-center text-sm text-gray-600">
            No hay proveedores para mostrar
        </p>
    @endforelse
    <div class="flex justify-center mt-2">
        {{$proveedores->links('vendor.livewire.pagination')}}
    </div>
</div>