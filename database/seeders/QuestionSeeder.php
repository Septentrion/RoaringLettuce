<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::factory()
            ->count(40)
            ->state(new Sequence(
                function (Sequence $sequence) {
                    return ['user_id' => User::all()->random()];
                },
            ))
            ->create();
    }
}
