<?php

namespace App\Livewire\Proveedor;

use App\Models\Proveedor;
use Livewire\Component;

class EditarProveedor extends Component
{
    public $proveedorId;
    public $empresa;
    public $representante;
    public $correo;
    public $telefono;
    public $direccion;

    protected $listeners = [
                            'cerrarModal'
                        ];

    protected $rules = [
        'empresa' => 'required|string|max:128',
        'representante' => 'required|string|max:128',
        'correo' => 'nullable|email',
        'telefono' => 'nullable|string|max:10|regex:/^[0-9]{7,10}$/',
        'direccion' => 'nullable|string|max:512',
    ];

    public function mount(Proveedor $proveedor){
        $this->proveedorId = $proveedor->id;
        $this->empresa = $proveedor->empresa;
        $this->representante = $proveedor->representante;
        $this->correo = $proveedor->correo;
        $this->telefono = $proveedor->telefono;
        $this->direccion = $proveedor->direccion;
    }

    public function editarProveedor(){
        $this->validate();

        $proveedor =[
            'id' => $this->proveedorId,
            'empresa' => trim($this->empresa),
            'representante' => trim($this->representante),
            'correo' => ($this->correo !== null && $this->correo !== '') ? trim($this->correo) : null,
            'telefono' => ($this->telefono !== null && $this->telefono !== '') ? trim($this->telefono) : null,
            'direccion' => ($this->direccion !== null && $this->direccion !== '') ? trim($this->direccion) : null
        ];        

        $this->dispatch('editarProveedor', $proveedor);
    }

    public function cerrarModal(){
        $this->dispatch('cerrarModal');
    }

    public function render()
    {
        return view('livewire.proveedor.editar-proveedor');
    }
}
