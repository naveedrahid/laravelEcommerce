<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $firstName = $this->faker->firstName();
        $lastName = $this->faker->lastName();
        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'user_name' => $firstName .$lastName,
            'customer_address' => $this->faker->address(),
            'country_name' => $this->faker->country(),
            'city_name' => $this->faker->city(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'order_status' => $this->faker->randomElement(['processing','on-hold', 'complete', 'cancelled', 'refund', 'processing']),
            'order_total' => $this->faker->unique()->numberBetween(100,500)
        ];
    }
}
