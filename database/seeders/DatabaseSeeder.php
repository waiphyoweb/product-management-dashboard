<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Product::factory()->count(50)->create();
        Category::factory()->count(10)->create();
        Seller::factory()->count(15)->create();
    }
}
