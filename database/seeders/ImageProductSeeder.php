<?php

namespace Database\Seeders;

use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ImageProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(100)->create();

        $products = Product::all();

        foreach ($products as $product) {
            ImageProduct::factory(4)->create([
                'product_id' => $product->id
            ]);
        }
    }
}
