<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'product_id',
    ];

    //Relación Pertenece a un Producto:
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
