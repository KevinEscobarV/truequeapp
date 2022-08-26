<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    

    public function definition()
    {
        $name = $this->faker->word;
        $slug = Str::slug($name.'-'.$this->faker->numberBetween(1, 100));

        return [
            'name' => $name,
            'slug' => $slug,
            'price_in' => $this->faker->numberBetween(10000, 200000),
            'price_out' => $this->faker->numberBetween(10000, 200000),
            'description' => $this->faker->text,
            'material' => $this->faker->word,
            'size' => $this->faker->word,
            'stock_in' => $this->faker->numberBetween(0, 100),
            'stock_out' => $this->faker->numberBetween(0, 100),
            'provider_id' => Provider::all()->random()->id,
        ];
    }
}
