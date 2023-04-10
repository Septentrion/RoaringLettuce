<?php

namespace Database\Factories;

use App\Models\BasketType;
use App\Models\Producer;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

class BasketTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference' => \ucfirst(\implode(' ',$this->faker->words(3))),
            'season' => $this->faker->randomElement(['printemps','été', 'automne', 'hiver']),
            'price' => $this->faker->randomFloat(2, 10, 200),
            'description' => $this->faker->text(100),
         ];
    }

    /**
     * (cf. BasketFactory)
     *
     * @return BasketTypeFactory
     */
    public function configure() {
        return $this->afterCreating(function (BasketType $basketType) {
            $basketType->productTypes()->attach(
                ProductType::all()->random(\random_int(3,8)),
                ['quantity' => \random_int(1,3)]
            );
        });
    }
}
