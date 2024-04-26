<?php

namespace App\Livewire\Inventario\Categoria;

use Livewire\Component;

class FiltrarCategoria extends Component
{
    public $categoria;

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
        return view('livewire.inventario.categoria.filtrar-categoria');
    }
}
