<?php

namespace App\Livewire\Proveedor;

use Livewire\Component;
use App\Models\Proveedor;

class NuevoProveedor extends Component
{
    public $empresa;
    public $representante;
    public $correo;
    public $telefono;
    public $direccion;

    protected $rules = [
        'empresa' => 'required|string|max:128',
        'representante' => 'required|string|max:128',
        'correo' => 'nullable|email',
        'telefono' => 'nullable|string|max:10|regex:/^[0-9]{7,10}$/',
        'direccion' => 'nullable|string|max:512',
    ];

    public function nuevoProveedor(){
        $this->validate();

        $proveedor =[
            'empresa' => trim($this->empresa),
            'representante' => trim($this->representante),
            'correo' => $this->correo !== null && $this->correo !== '' ? trim($this->correo) : null,
            'telefono' => $this->telefono !== null && $this->telefono !== '' ? trim($this->telefono) : null,
            'direccion' => $this->direccion !== null && $this->direccion !== '' ? trim($this->direccion) : null
        ];        

        $this->dispatch('nuevoProveedor', $proveedor);
        $this->dispatch('close-modal', 'nuevo-proveedor');
        $this->reset();
        $this->dispatch('mensaje', ['icon' => 'success', 'title' => 'Guardado!', 'messaje' => 'Proveedor registrado correctamente']);
    }

    public function render()
    {
        return view('livewire.proveedor.nuevo-proveedor');
    }
}
