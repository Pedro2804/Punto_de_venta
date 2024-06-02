<?php

namespace App\Livewire\Inventario\Categoria;

use Livewire\Component;

class NuevaCategoria extends Component
{
    public $nueva_categoria;

    protected $rules = [
        'nueva_categoria' => 'required|string'
    ];

    public function nuevaCategoria(){
        $this->validate();
        $this->dispatch('nuevaCategoria', trim($this->nueva_categoria));
        $this->reset('nueva_categoria');
    }

    public function render()
    {
        return view('livewire.inventario.categoria.nueva-categoria');
    }
}
