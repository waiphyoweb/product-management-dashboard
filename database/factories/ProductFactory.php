<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->text(7),
            'price' => $this->faker->numberBetween(1000, 200000),
            'category_id' => Category::factory(),
            'seller_id' => Seller::factory(),
        ];
    }
}
