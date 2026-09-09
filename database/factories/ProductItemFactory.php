<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductItem>
 */
class ProductItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'quantidade' => $this->faker->numberBetween(1,100),
            'cor' => $this->faker->safeColorName(),
            'valor' => $this->faker->randomFloat(2,5,200),
            'product_id' => Product::factory(),
        ];
    }
}
