<?php

namespace App\Livewire\Inventario;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;

class MostrarProductos extends Component
{
    use WithPagination;

    public $prodSeleccionado = null;

    protected $listeners = [
        'nuevoProducto',
        'editarProducto',
        'eliminarProducto',
        'busqueda',
        'abrirModal',
        'cerrarModal',
    ];

    public function nuevoProducto($producto){
        try {
            Producto::create([
                'name' => $producto['name'],
                'sku' => $producto['sku'],
                'categoria_id' => $producto['categoria_id'],
                'descripcion' => $producto['descripcion'],
                'precio_compra' => $producto['precio_compra'],
                'precio_venta' => $producto['precio_venta'],
                'stock' => $producto['stock'],
                'stock_min' => $producto['stock_min'],
                'proveedor_id' => $producto['proveedor_id'],
                'imagen' => $producto['imagen']
            ]);

            $this->resetPage();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function editarproducto($prod){
        try{
            $producto = Producto::find($prod['id']);

            $producto->name = $prod['name'];
            $producto->sku = $prod['sku'];
            $producto->categoria_id = $prod['categoria_id'];
            $producto->descripcion = $prod['descripcion'];
            $producto->precio_compra = $prod['precio_compra'];
            $producto->precio_compra = $prod['precio_venta'];
            $producto->stock = $prod['precio_compra'];
            $producto->stock_min = $prod['precio_compra'];
            $producto->proveedor_id = $prod['proveedor_id'];
            $producto->imagen = $prod['imagen'] ?? $producto->imagen;

            $producto->save();
            
            $this->resetPage();
            $this->cerrarModal();
            $this->dispatch('mensaje', ['icon' => 'success', 'title' => 'Guardado!', 'messaje' => 'Cambios guardados correctamente']);
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function eliminarProducto($id){
        try{
            $producto = Producto::find($id);
            $producto->delete();
            $this->resetPage();
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function abrirModal($prodSeleccionado){
        $this->prodSeleccionado = Producto::find($prodSeleccionado);
        $this->dispatch('open-modal', 'editar-producto');
    }

    public function cerrarModal(){
        $this->prodSeleccionado = null;
        $this->dispatch('close-modal', 'editar-producto');
    }

    public function render()
    {
        $productos = Producto::latest()->paginate(5);
        
        return view('livewire.inventario.mostrar-productos', [
            'productos' => $productos
        ]);
    }
}
