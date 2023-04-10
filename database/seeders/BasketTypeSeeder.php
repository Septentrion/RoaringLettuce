<?php

namespace Database\Seeders;

use App\Models\BasketType;
use App\Models\Producer;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class BasketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BasketType::factory()
            ->count(40)
            ->state(new Sequence(
                function (Sequence $sequence) { return ['producer_id' => Producer::all()->random()]; },
            ))
            ->create();
    }
}
