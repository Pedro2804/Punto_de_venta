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
        'descriion',
        'precioompra',
        'precioenta',
        'stock',
        'stock_n',
        'proveedor_id'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
