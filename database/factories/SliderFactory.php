<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;

        return [
            'label_name'=> $firstName,
            'slide_text'=> $lastName,
            'slide_img'=> 'No image Found',
            'slide_status'=> $this->faker->randomElement(['draft', 'published'])
        ];
    }
}
