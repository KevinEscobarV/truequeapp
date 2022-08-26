<?php

namespace Database\Seeders;

use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        \App\Models\User::factory(50)->create();

        \App\Models\Provider::factory(50)->create();

        $this->call(ImageProductSeeder::class);


    }
}
