<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    protected $model = \App\Models\Provider::class;
    
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'city' => $this->faker->city,
            'description' => $this->faker->text,
        ];
    }
}
