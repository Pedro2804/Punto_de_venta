<?php

namespace App\Livewire\Inventario\Categoria;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;

class MostrarCategorias extends Component
{
    use WithPagination;
    
    protected $listeners = [
                            'nuevaCategoria',
                            'editarCategoria',
                            'eliminarCategoria'
                        ];

    public $categoria;

    protected $rules = [
        'categoria' => 'required|string'
    ];

    public function nuevaCategoria(){
        $datos = $this->validate();

        try {
            Categoria::create([
                'categoria' => $datos['categoria']
            ]);

            $this->reset('categoria');
            $this->resetPage();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function editarCategoria($id, $name){
        if($name !== ''){
            try{
                $category = Categoria::find($id);
                $category->categoria = $name;
                $category->save();
                $this->resetPage();
            }catch(\Exception $e){
                dd($e);
            }
        }
    }

    public function eliminarCategoria($id){
        try{
            $category = Categoria::find($id);
            $category->delete();
            $this->resetPage();
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function render()
    {
        $categorias = Categoria::latest()->paginate(5);

        return view('livewire.inventario.categoria.mostrar-categorias', [
            'categorias' => $categorias
        ]);
    }
}
