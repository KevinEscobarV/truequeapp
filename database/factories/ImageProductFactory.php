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
            'url' => $this->faker->imageUrl(640, 480),
        ];
    }
}
