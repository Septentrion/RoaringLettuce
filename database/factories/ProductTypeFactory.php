<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => \ucfirst($this->faker->unique()->word()),
            'description' => $this->faker->sentence()
        ];
    }
}
