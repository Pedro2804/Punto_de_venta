<div class="text-gray-900">
    <div class="bg-white mb-4 hidden md:flex">
        <div class="bg-gray-200 w-1/5">
            <p class="text-2xl font-bold text-center">
                {{__('SKU')}}
            </p>
        </div>
        <div class="w-1/4">
            <p class="text-2xl font-bold text-center">
                {{__('Producto')}}
            </p>
        </div>
        <div class="bg-gray-200 w-1/5">
            <p class="text-2xl font-bold text-center">
                {{__('Stock')}}
            </p>
        </div>
        <div class="w-1/5">
            <p class="text-2xl font-bold text-center">
                {{__('Precio')}}
            </p>
        </div>
        <div class="bg-gray-200 w-1/5">
            <p class="text-2xl font-bol text-center">
                {{__('Acciones')}}
            </p>
        </div>
    </div>

    @forelse ( $productos as $producto)
        <div class="py-2 bg-white border-b border-gray-300 md:flex">
            <div class="md:w-1/4 md:text-center">
                <p class="md:text-lg md:font-semibold md:text-gray-600 text-xl font-bold">
                    {{$producto->sku}}
                </p>
            </div>
            <div class="md:w-1/4 md:text-center">
                <p class="md:text-lg md:font-semibold md:text-gray-600 text-sm text-gray-600">
                    <span class="md:hidden ">
                        Producto: 
                    </span>
                    {{$producto->name}}
                </p>
            </div>
            <div class="md:w-1/4 md:text-center">
                <p class="md:text-lg md:font-semibold md:text-gray-600 text-sm text-gray-500">
                    <span class="md:hidden ">
                        Stock:
                    </span>
                    {{__($producto->stock)}}
                </p>
            </div>
            <div class="md:w-1/4 md:text-center">
                <p class="md:text-lg md:font-semibold md:text-gray-600 text-sm text-gray-500">
                    <span class="md:hidden ">
                        Precio:
                    </span>
                    ${{__($producto->precio_venta)}}
                </p>
            </div>

            <div class="flex flex-col md:flex-row items-stretch md:justify-center gap-3 mt-2 md:mt-0 md:w-1/4">
                <button
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase flex justify-center items-center
                        cursor-pointer hover:bg-blue-700" 
                        wire:click="$dispatch('abrirModal', [{{$producto->id}}])" >
                    <div>{{ __('Edit')}}</div>

                    <div class="ms-1">
                        <x-icons :src="asset('img/edit.svg')" class="h-5" />
                    </div>
                </button>

                <button 
                    wire:click="$dispatch('Eliminar', {id: {{$producto->id}}, name: '{{$producto->name}}'})"
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
            No hay productos para mostrar
        </p>
    @endforelse
    <div class="flex justify-center mt-2">
        {{$productos->links('vendor.livewire.pagination')}}
    </div>

    <x-modal name="editar-producto" focusable>
        @if($prodSeleccionado)
            <livewire:inventario.editar-producto :producto="$prodSeleccionado" />
        @endif
    </x-modal>
</div>

@push('scripts')
    <script src="{{asset('js/sweetalert2@11.js')}}"></script>
        
    <script>
        Livewire.on('mensaje', param => {
            Swal.fire({
                title: param[0]['title'],
                text: param[0]['messaje'],
                icon: param[0]['icon'],
                showConfirmButton: false,
                timer: 1500
            });
        });

        Livewire.on('Eliminar', (producto) => {
            Swal.fire({
                title: '¿Está seguro de eliminar '+producto['name']+'?',
                text: "{{__('You won\'t be able to revert this!')}}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1e40af',
                cancelButtonColor: '#dc2626',
                confirmButtonText: "{{__('Confirm')}}",
                cancelButtonText: "{{__('Cancel')}}"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('eliminarProducto', [producto['id']]);
                    
                    Livewire.dispatch('mensaje', [{
                                                    'icon': 'success',
                                                    'title': 'Eliminado!',
                                                    'messaje': 'El producto ha sido eliminado'}]);
                }
            });
        });
    </script>

@endpush