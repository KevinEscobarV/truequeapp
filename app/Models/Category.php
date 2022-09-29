<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relación Tiene Muchos Productos:
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image) {
            return '/storage/categories/' . $this->image;
        }

        $firstProduct = $this->products()->first();
        if ($firstProduct) {
            return $firstProduct->featured_image_url;
        }

        return '/images/products/default.jpg';
    }
}
