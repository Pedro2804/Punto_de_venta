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
            'correo' => $this->correo !== null ? trim($this->correo) : $this->correo,
            'telefono' => $this->telefono !== null ? trim($this->telefono) : $this->telefono,
            'direccion' => $this->direccion !== null ? trim($this->direccion) : $this->direccion
        ];        

        try {
            Proveedor::create([
                'empresa' => $proveedor['empresa'],
                'representante' => $proveedor['representante'],
                'correo' => $proveedor['correo'],
                'telefono' => $proveedor['telefono'],
                'direccion' => $proveedor['direccion']
            ]);
            //$this->resetPage();
            $this->reset();
            $this->dispatch('close-modal', 'nuevo-proveedor');
        } catch (\Exception $e) {
            dd($e);
        }
        // $this->dispatch('nuevoProveedor', $proveedor);
        // $this->reset();
    }

    public function render()
    {
        return view('livewire.proveedor.nuevo-proveedor');
    }
}
