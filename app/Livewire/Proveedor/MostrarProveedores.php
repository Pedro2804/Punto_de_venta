<?php

namespace App\Livewire\Proveedor;

use Livewire\Component;
use App\Models\Proveedor;
use Livewire\WithPagination;

class MostrarProveedores extends Component
{
    use WithPagination;

    protected $listeners = ['nuevoProveedor' => 'nuevo'];

    public function nuevo($proveedor){
        dd($proveedor);
        
        try {
            Proveedor::create([
                'empresa' => $proveedor['empresa'],
                'representante' => $proveedor['representante'],
                'correo' => $proveedor['correo'],
                'telefono' => $proveedor['telefono'],
                'direccion' => $proveedor['direccion']
            ]);
            //$this->resetPage();
            $this->dispatch('close-modal', 'nuevo-proveedor');
        } catch (\Exception $e) {
            dd($e);
        }
    }
    
    public function render()
    {
        return view('livewire.proveedor.mostrar-proveedores');
    }
}
