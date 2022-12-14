<?php

namespace Database\Factories;

use App\Models\ImageProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageProductFactory extends Factory
{

    protected $model = \App\Models\ImageProduct::class;

    public function definition()
    {
        return [
            'url' => 'products/' . $this->faker->image('public/storage/products', 640, 480, null, false)
        ];
    }
}
