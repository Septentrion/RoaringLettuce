<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Basket;
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
            'name' => $this->faker->word(),
            'unit' => $this->faker->randomElement(['pc', 'dz', 'gr', 'kg', 'l']),
            'unit_price' => $this->faker->randomFloat(2, 0,50),
            'description' => $this->faker->paragraph(),
            'season' => $this->faker->randomElement(['printemps','été', 'automne', 'hiver']),
        ];
    }
}
