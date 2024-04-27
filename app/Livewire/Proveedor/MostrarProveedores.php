<?php

namespace App\Livewire\Proveedor;

use Livewire\Component;
use App\Models\Proveedor;
use Livewire\WithPagination;

class MostrarProveedores extends Component
{
    use WithPagination;
    
    protected $listeners = [
                            'nuevoProveedor' => 'nuevo',
                            'editarCategoria',
                            'eliminarCategoria',
                            'busqueda' => 'buscar'
                        ];

    public function nuevo($proveedor){
        try {
            Proveedor::create([
                'empresa' => $proveedor['empresa'],
                'representante' => $proveedor['representante'],
                'correo' => $proveedor['correo'],
                'telefono' => $proveedor['telefono'],
                'direccion' => $proveedor['direccion']
            ]);
            $this->dispatch('close-modal', 'nuevo-proveedor');
            $this->resetPage();
        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function render()
    {
        $proveedores = Proveedor::latest()->paginate(5);
        return view('livewire.proveedor.mostrar-proveedores', [
            'proveedores' => $proveedores
        ]);
    }
}
