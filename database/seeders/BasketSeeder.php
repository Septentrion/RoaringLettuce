<?php

namespace Database\Seeders;

use App\Models\Basket;
use App\Models\BasketType;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class BasketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Basket::factory()
            ->count(100)
            ->state(new Sequence(
                function (Sequence $sequence) { return [
                    'basket_type_id' => BasketType::all()->random(),
                    'delivery_id' => Delivery::all()->random(),
                ]; },
            ))
            ->create();
    }
}
