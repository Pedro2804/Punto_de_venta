<?php

namespace App\Livewire\Inventario\Categoria;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;

class MostrarCategorias extends Component
{
    use WithPagination;
    
    protected $listeners = [
                            'nuevaCategoria' => 'nueva',
                            'editarCategoria',
                            'eliminarCategoria',
                            'busqueda' => 'buscar'
                        ];

    public $categoria = '';

    public function nueva($categoria){
        try {
            Categoria::create([
                'categoria' => $categoria
            ]);
            $this->resetPage();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function editarCategoria($categoriaId, $categoria){
        if($categoria !== ''){
            try{
                $category = Categoria::find($categoriaId);
                $category->categoria = $categoria;
                $category->save();
                $this->resetPage();
            }catch(\Exception $e){
                dd($e);
            }
        }
    }

    public function eliminarCategoria($categoriaId){
        try{
            $category = Categoria::find($categoriaId);
            $category->delete();
            $this->resetPage();
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function buscar($categoria){
        $this->categoria = $categoria;
    }

    public function render()
    {
        if($this->categoria !== ''){
            $categorias = Categoria::when($this->categoria, function($query) {
                $query->where('categoria', 'LIKE', "%".$this->categoria."%");
            })->paginate(5);
        }else{
            $categorias = Categoria::latest()->paginate(5);
        }

        return view('livewire.inventario.categoria.mostrar-categorias', [
            'categorias' => $categorias
        ]);
    }
}
