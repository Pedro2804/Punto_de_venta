<?php

namespace App\Livewire\Proveedor;

use Livewire\Component;
use App\Models\Proveedor;
use Livewire\WithPagination;

class MostrarProveedores extends Component
{
    use WithPagination;
    public $provSeleccionado = null;
    public $proveedor = '';
    
    protected $listeners = [
                            'nuevoProveedor',
                            'editarProveedor',
                            'eliminarProveedor',
                            'busqueda',
                            'abrirModal',
                            'cerrarModal',
                        ];

    public function nuevoProveedor($proveedor){
        try {
            Proveedor::create([
                'empresa' => $proveedor['empresa'],
                'representante' => $proveedor['representante'],
                'correo' => $proveedor['correo'],
                'telefono' => $proveedor['telefono'],
                'direccion' => $proveedor['direccion']
            ]);

            $this->resetPage();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function editarProveedor($prov){
        try{
            $proveedor = Proveedor::find($prov['id']);

            $proveedor->empresa = $prov['empresa'];
            $proveedor->representante = $prov['representante'];
            $proveedor->correo = $prov['correo'];
            $proveedor->telefono = $prov['telefono'];
            $proveedor->direccion = $prov['direccion'];

            $proveedor->save();
            
            $this->resetPage();
            $this->cerrarModal();
            $this->dispatch('mensaje', ['icon' => 'success', 'title' => 'Guardado!', 'messaje' => 'Cambios guardados correctamente']);
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function eliminarProveedor($proveedorId){
        try{
            $proveedor = Proveedor::find($proveedorId);
            $proveedor->delete();
            $this->resetPage();
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function busqueda($proveedor){
        $this->resetPage();
        $this->proveedor = $proveedor;
    }

    public function abrirModal($provSeleccionado){
        $this->provSeleccionado = Proveedor::find($provSeleccionado);
        $this->dispatch('open-modal', 'editar-proveedor');
    }

    public function cerrarModal(){
        $this->provSeleccionado = null;
        $this->dispatch('close-modal', 'editar-proveedor');
    }

    public function render()
    {
        if($this->proveedor !== ''){
            $proveedores = Proveedor::when($this->proveedor, function($query) {
                $query->where('empresa', 'LIKE', "%".$this->proveedor."%");
            })->paginate(5);
        }else{
            $proveedores = Proveedor::latest()->paginate(5);
        }

        return view('livewire.proveedor.mostrar-proveedores', [
            'proveedores' => $proveedores
        ]);
    }
}
