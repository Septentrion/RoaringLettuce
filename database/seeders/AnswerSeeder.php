<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::factory()
            ->count(200)
            /*
             * - `state` permet de définir un sous-ensemble des propriétés d'un objet factice
             * - `Sequence` agit un peu comme un générateur,  en produisant des valeurs à la demande
             */
            ->state(new Sequence(
                function (Sequence $sequence) {
                    return [
                        'question_id' => Question::all()->random(),
                        'user_id' => User::all()->random(),
                    ];
                },
            ))
            ->create();
    }
}
