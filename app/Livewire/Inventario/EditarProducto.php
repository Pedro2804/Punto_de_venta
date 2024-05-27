<?php

namespace App\Livewire\Inventario;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;

class EditarProducto extends Component
{
    use WithFileUploads;

    public $categorias;
    public $proveedores;

    public ?Producto $producto;

    public $producto_id;
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
    public $imagen_nueva;

    protected $listeners = [
        'cargar',
        'calcularPrecio',
        'buscarCategoria',
        'buscarProveedor',
    ];

    public function rules()
    {
        return [
            'name' => 'required|string|',
            'sku' => 'required|string|unique:productos,sku,id',
            'sku' => [
                'required',
                'string',
                Rule::unique(Producto::class)->ignore($this->producto->id), 
            ],
            'categoria_id' => 'required|numeric|exists:categorias,id',
            'descripcion' => 'nullable|string|max:512',
            'precio_compra' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'stock_min' => 'nullable|numeric|min:10',
            'proveedor_id' => 'required|numeric|exists:proveedores,id',
            'imagen_nueva' => 'nullable|image|max:1024'
        ];
    }

    public function mount(Producto $producto){
        $this->producto_id = $producto->id;
        $this->name = $producto->name;
        $this->sku = $producto->sku;
        $this->categoria_id = $producto->categoria_id;

        $categoria = Categoria::find($producto->categoria_id);
        $this->nameCategoria = $categoria->categoria;

        $this->descripcion = $producto->descripcion;
        $this->precio_compra = $producto->precio_compra;
        $this->precio_venta = $producto->precio_venta;
        $this->ganancia = $producto->precio_venta - $producto->precio_compra;
        $this->stock = $producto->stock;
        $this->stock_min = $producto->stock_min;
        $this->proveedor_id = $producto->proveedor_id;

        $proveedor = Proveedor::find($producto->proveedor_id);
        $this->nameProveedor = $proveedor->empresa;

        $this->imagen = $producto->imagen;
    }

    public function editarProducto(){
        $datos = $this->validate();
        $datos['id'] = $this->producto_id;

        try {
            if($this->imagen_nueva){
                $imagenUrl = $this->imagen_nueva->store('public/img/productos');
                $datos['imagen'] = str_replace('public/img/productos/', '', $imagenUrl);
            }
 
            $this->dispatch('editarProducto', $datos);
            $this->reset();
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
    public function cargar(){
        $this->categorias = Categoria::all();
        $this->proveedores = Proveedor::all();
    }

    public function render()
    {
        $this->categorias = Categoria::all();
        $this->proveedores = Proveedor::all();
        
        return view('livewire.inventario.editar-producto', [
            'categorias' => $this->categorias,
            'proveedores' => $this->proveedores,
            
        ]);
    }
}
