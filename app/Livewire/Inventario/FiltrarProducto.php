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
    public $por_categoria;

    protected $listeners = [
        'filtrarProductos'
    ];

    public function filtrarProductos(){
        dd($this->por_categoria);
        $this->dispatch('busqueda', trim($this->por_categoria));
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
