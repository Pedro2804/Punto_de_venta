<?php

namespace App\Livewire\Inventario;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class NuevoProducto extends Component
{
    use WithFileUploads;

    public $categorias;
    public $proveedores;

    public $name;
    public $sku;

    #[Validate(as: 'Categoria')]
    public $categoria_id;
    public $nameCategoria;
    public $descripcion;
    public $precio_compra;
    public $precio_venta;
    public $ganancia;
    public $stock;
    public $stock_min;
    
    #[Validate(as: 'Proveedor')]
    public $proveedor_id;
    public $nameProveedor;
    public $imagen;

    protected $listeners = [
                            'actualizar_lista_cat_prov',
                            'calcularPrecio',
                            'buscarCategoria',
                            'buscarProveedor',
                        ];

    protected $rules = [
                        'name' => 'required|string|',
                        'sku' => 'required|string|unique:'.Producto::class,
                        'categoria_id' => 'required|numeric|exists:categorias,id',
                        'descripcion' => 'nullable|string|max:512',
                        'precio_compra' => 'required|numeric|min:0',
                        'precio_venta' => 'required|numeric|min:0',
                        'stock' => 'required|numeric|min:0',
                        'stock_min' => 'nullable|numeric|min:10',
                        'proveedor_id' => 'required|numeric|exists:proveedores,id',
                        'imagen' => 'nullable|image|max:1024'
                    ];

    public function mount(){
        $this->precio_compra = 0;
        $this->precio_venta = 0;
        $this->ganancia = 0;
        $this->stock_min = 10;
    }

    public function nuevoProducto(){
        $datos = $this->validate();
        
        try {
            if($datos['imagen'] !== null){
                $imagenUrl = $this->imagen->store('public/img/productos');
                $datos['imagen'] = str_replace('public/img/productos/', '', $imagenUrl);
            }

            $this->dispatch('nuevoProducto', $datos);
            // $this->dispatch('close-modal', 'nuevo-producto');
            $this->dispatch('mensaje', ['icon' => 'success', 'title' => 'Guardado!', 'messaje' => 'Producto registrado correctamente']);
            $this->reset();
            $this->mount();

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function buscarCategoria(){
        if($this->categoria_id !== ''){
            $categoria = Categoria::find($this->categoria_id);
            if($categoria !== null){
                $this->nameCategoria = $categoria->categoria;
            }else{
                $this->reset('nameCategoria');
            }
        }else{
            $this->reset('nameCategoria');
        }
        $this->resetErrorBag();
    }

    public function buscarProveedor(){
        if($this->proveedor_id !== ''){
            $proveedor = Proveedor::find($this->proveedor_id);
            if($proveedor !== null){
                $this->nameProveedor = $proveedor->empresa;
            }else{
                $this->reset('nameProveedor');
            }
        }else{
            $this->reset('nameProveedor');
        }
        $this->resetErrorBag();
    }

    public function calcularPrecio(){
        if($this->precio_compra !== '' && $this->precio_venta !== ''){
            $this->ganancia = $this->precio_venta - $this->precio_compra;
        }
    }

    // Cargar los datos cuando se crea uno nuevo 
    public function actualizar_lista_cat_prov(){
        $this->categorias = Categoria::all();
        $this->proveedores = Proveedor::all();
    }

    public function render()
    {
        $this->actualizar_lista_cat_prov();

        return view('livewire.inventario.nuevo-producto', [
            'categorias' => $this->categorias,
            'proveedores' => $this->proveedores,
            
        ]);
    }
}
