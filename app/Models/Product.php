<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];

    //Relación Pertenece a un proveedor:
    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    //Relación Pertenece a una categoria:
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Relación Tiene Muchas Imagenes:
    public function images(){
        return $this->hasMany(ImageProduct::class); 
    }

    //Slug Producto
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
