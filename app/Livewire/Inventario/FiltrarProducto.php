<?php

namespace App\Livewire\Inventario;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Proveedor;

class FiltrarProducto extends Component
{
    public $categorias;
    public $proveedores;
    public $categoria_id;

    protected $listeners = [
        'filtrarEntrada'
    ];

    public function datosAfiltrar(){
        $this->dispatch('busqueda', trim($this->categoria));
    }

    public function filtrarEntrada(){
        $this->dispatch('busqueda', trim($this->categoria));
    }

    public function render()
    {
        $this->categorias = Categoria::all();
        $this->proveedores = Proveedor::all();
        return view('livewire.inventario.filtrar-producto', [
            'categorias' => $this->categorias,
            'proveedores' => $this->proveedores,
        ]);
    }
}
