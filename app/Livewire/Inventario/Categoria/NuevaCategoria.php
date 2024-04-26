<?php

namespace App\Livewire\Inventario\Categoria;

use Livewire\Component;

class NuevaCategoria extends Component
{
    public $categoria;

    protected $rules = [
        'categoria' => 'required|string'
    ];

    public function nuevaCategoria(){
        $this->validate();
        $this->dispatch('nuevaCategoria', trim($this->categoria));
        $this->reset('categoria');
    }

    public function render()
    {
        return view('livewire.inventario.categoria.nueva-categoria');
    }
}
