<div>
    <!-- Boton para abril el modal -->
    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md
                    text-white bg-orange-400 hover:text-black hover:bg-orange-500 hover:border-black
                    focus:outline-none transition ease-in-out duration-150 ms-4"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'mostrar-categorias')" >
        <div>{{ __('Category').'s'}}</div>

        <div class="ms-1">
            <x-icons :src="asset('img/tools.svg')" class="h-5" />
        </div>
    </button>
    <!-- Fin boton para abril el modal -->

    <x-modal name="mostrar-categorias" focusable>
        <header class="bg-orange-500 shadow py-2">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center">
                <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                    {{ __('Category').'s'}}
                </h2>
            </div>
        </header>

        <!-- Crear categoria -->
        <livewire:inventario.categoria.nueva-categoria>
        <!-- Fin crear s -->

        <div class="bg-white m-4 overflow-hidden shadow-sm sm:rounded-lg">

            <!-- Filtrar categorias -->
            <livewire:inventario.categoria.filtrar-categoria>
            <!-- Fin filtrar categorias -->

            <!-- Mostrar categorias -->
            <div class="p-4 text-gray-900">
                @forelse ( $categorias as $categoria)
                    <div class="p-2 bg-white border-b border-gray-200 sm:flex sm:justify-between sm:items-center ">
                        <div class="space-y-3">
                            <p class="text-xl font-bold ps-2">
                                {{$categoria->categoria}}
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row items-stretch gap-3 mt-4 sm:mt-0">
                            <button 
                                wire:click="$dispatch('Editar', {id: {{$categoria->id}}, categoria: '{{$categoria->categoria}}'})"
                                class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase flex justify-center items-center
                                cursor-pointer hover:bg-blue-700" >
                                <div>{{ __('Edit')}}</div>

                                <div class="ms-1">
                                    <x-icons :src="asset('img/edit.svg')" class="h-5" />
                                </div>
                            </button>

                            <button 
                                wire:click="$dispatch('Eliminar', {id: {{$categoria->id}}, categoria: '{{$categoria->categoria}}'})"
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
                        No hay categorias para mostrar
                    </p>
                @endforelse
                <div class="flex justify-center mt-2">
                    {{$categorias->links('vendor.livewire.pagination')}}
                </div>
            </div>
            <!-- Fin mostrar categorias -->
        </div>
        <div class="flex items-center justify-center px-4 sm:px-0 mb-4">
            <x-secondary-button x-on:click="$dispatch('close-modal', 'mostrar-categorias')" class="w-full sm:w-auto justify-center">
                {{ __('Close') }}
            </x-secondary-button>
        </div>
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
        
        Livewire.on('Editar', (categoria) => {
            Swal.fire({
                title: "{{__('Edit :name', ['name' => 'Categoría'])}}",
                input: "text",
                inputValue: categoria['categoria'],
                inputAttributes: {
                    autocapitalize: "off"
                },
                showCancelButton: true,
                confirmButtonText: "{{__('Save :name', ['name' => 'cambios'])}}",
                confirmButtonColor: "#1e40af",
                cancelButtonText: "{{__('Cancel')}}",
                cancelButtonColor: "#dc2626",
                showLoaderOnConfirm: true,
                preConfirm: (inputValue) => {
                    if (!inputValue || inputValue.trim() === "") {
                        Swal.showValidationMessage("{{__('Please enter a valid value')}}");
                    } else {
                        return inputValue;
                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    const newCategory = result.value;

                    Livewire.dispatch('editarCategoria', [categoria['id'], newCategory]);
                    Livewire.dispatch('mensaje', [{
                                                    'icon': 'success',
                                                    'title': 'Guardado!',
                                                    'messaje': 'Cambios guardados correctamente'}]);
                    
                }
            });
        });

        Livewire.on('Eliminar', (categoria) => {
            Swal.fire({
                title: '¿Está seguro de eliminar '+categoria['categoria']+'?',
                text: "{{__('You won\'t be able to revert this!')}}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1e40af',
                cancelButtonColor: '#dc2626',
                confirmButtonText: "{{__('Confirm')}}",
                cancelButtonText: "{{__('Cancel')}}"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('eliminarCategoria', [categoria['id']]);
                    
                    Livewire.dispatch('mensaje', [{
                                                    'icon': 'success',
                                                    'title': 'Eliminado!',
                                                    'messaje': 'La categoría ha sido eliminada'}]);
                }
            });
        });
    </script>
@endpush