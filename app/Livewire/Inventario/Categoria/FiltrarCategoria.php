<?php

namespace App\Livewire\Inventario\Categoria;

use Livewire\Component;

class FiltrarCategoria extends Component
{
    public $filtrar_categoria;

    public function updatedFiltrarCategoria()
    {
        $this->dispatch('filtrarCategoria_mostrar', trim($this->filtrar_categoria));
    }

    public function render()
    {
        return view('livewire.inventario.categoria.filtrar-categoria');
    }
}
