<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ProductTypeSeeder::class,
            BasketTypeSeeder::class,
            ProductSeeder::class,
            DeliverySeeder::class,
            BasketSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
        ]);
    }
}
