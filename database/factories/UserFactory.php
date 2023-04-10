<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Producer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'name' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->regexify('0[1-7][0-9]{8}'),
            'postal_code' => $this->faker->regexify('[0-9]{2}[0-6][0-9][0-4]'),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * (cf. BasketFactory)
     * Ici `configure` permet de réifier les associations polymorphes pour les diférentes ctégories d'utilisateurs.
     * Comme les objets sont très légers et que la clef étrangère est sur la clef primaire de Client et Producer, ils sont créés à la volée.
     *
     * @return UserFactory
     */
    public function configure() {
        return $this->afterCreating(function (User $user) {
            if (\random_int(1, 4) > 1) {
                $client = Client::create(['id' => $user->id]);
            } else {
                $client = Producer::create(['id' => $user->id]);
            }

            $client->type()->save($user);
        });
    }

}
