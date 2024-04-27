<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Proveedores') }}
        </h2>

        {{--New proveedor--}}
            @include('system.proveedor.create')
        {{--End new proveedor--}}

    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <div class="bg-white m-4 overflow-hidden shadow-sm sm:rounded-lg">
                        <livewire:proveedor.mostrar-proveedores />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
