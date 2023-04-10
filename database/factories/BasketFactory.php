<?php

namespace Database\Factories;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class BasketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference' => \ucfirst($this->faker->sentence()),
        ];
    }

    /**
     * La méthode `configure` permet d'appliquer des traitements complémentaires aux objets factices créés.
     * La méthode `afterCreating` indique que ces traitements sont appliqués _après_ la création de l'objet.
     * Nous nous en servons ici pour créer les associations ManyToMany (en l'occurrence entre Basket et Product.
     * Nous ne pourrions pas faire une telle chose dans la méthode `definition`.
     *
     * @return BasketFactory
     */
    public function configure() {
        return $this->afterCreating(function (Basket $basket) {
            $basket->products()->attach(
                Product::all()->random(5),
                ['quantity' => \random_int(1,10)]
            );
        });
    }
}
