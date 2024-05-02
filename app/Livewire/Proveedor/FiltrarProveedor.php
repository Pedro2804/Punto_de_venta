<?php

namespace App\Livewire\Proveedor;

use Livewire\Component;

class FiltrarProveedor extends Component
{
    public $proveedor;

    protected $listeners = [
                            'filtrarEntrada'
                            ];

    public function datosAfiltrar(){
        $this->dispatch('busqueda', trim($this->proveedor));
    }

    public function filtrarEntrada(){
        $this->dispatch('busqueda', trim($this->proveedor));
    }

    public function render()
    {
        return view('livewire.proveedor.filtrar-proveedor');
    }
}
