<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'categoria_id',
        'descripcion',
        'precio_compra',
        'precio_venta',
        'stock',
        'stock_min',
        'proveedor_id',
        'imagen'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
}
