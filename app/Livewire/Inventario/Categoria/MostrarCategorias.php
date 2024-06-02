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
                            'eliminarCategoria',
                            'filtrarCategoria_mostrar'
                        ];

    public $filtrar_categoria = '';

    public function nuevaCategoria($nueva_categoria){
        try {
            Categoria::create([
                'categoria' => $nueva_categoria
            ]);
            
            $this->dispatch('actualizar_lista_cat_prov');
            $this->dispatch('mensaje', ['icon' => 'success', 'title' => 'Guardado!', 'messaje' => 'Categoría registrado correctamente']);
            $this->resetPage();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function editarCategoria($categoriaId, $categoria_nueva){
        if($categoria_nueva !== ''){
            try{
                $category = Categoria::find($categoriaId);
                $category->categoria = $categoria_nueva;
                $category->save();
                $this->resetPage();
            }catch(\Exception $e){
                dd($e);
            }
        }
    }

    public function eliminarCategoria($categoriaId_eliminar){
        try{
            $category = Categoria::find($categoriaId_eliminar); 
            $category->delete();
            $this->resetPage();
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function filtrarCategoria_mostrar($filtrar_categoria){
        $this->resetPage();
        $this->filtrar_categoria = $filtrar_categoria;
    }

    public function render()
    {
        if($this->filtrar_categoria !== ''){
            $categorias = Categoria::when($this->filtrar_categoria, function($query) {
                $query->where('categoria', 'LIKE', "%".$this->filtrar_categoria."%");
            })->paginate(5);
        }else{
            $categorias = Categoria::latest()->paginate(5);
        }

        return view('livewire.inventario.categoria.mostrar-categorias', [
            'categorias' => $categorias
        ]);
    }
}
