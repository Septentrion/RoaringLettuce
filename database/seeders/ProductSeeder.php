<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Product::factory()
                ->count(100)
                ->state(new Sequence(
                    function (Sequence $sequence) { return ['product_type_id' => ProductType::all()->random()]; },
                ))
                ->create();
    }
}
