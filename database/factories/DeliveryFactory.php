<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\Producer;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $meetingDate = $this->faker->dateTimeThisYear();

        return [
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'start_time' => $meetingDate,
            'end_time' => $meetingDate->add(\DateInterval::createFromDateString('+6 hours')),
        ];
    }

    /**
     * (cf. BasketFactory)
     *
     * @return DeliveryFactory
     */
    public function configure() {
        return $this->afterCreating(function (Delivery $delivery) {
            $delivery->producer()->attach(
                Producer::all()->random(\random_int(3,12))
            );
        });
    }
}
