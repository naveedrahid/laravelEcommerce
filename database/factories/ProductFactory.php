<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'=> $this->faker->numberBetween($min = 1, $max = 50),
            'product_title'=> $this->faker->name(),
            'product_short_desc'=> $this->faker->text($maxNbChars = 200),
            'product_desc'=> $this->faker->text(),
            'product_image'=> 'No image found',
            'product_qnty'=> $this->faker->unique()->numberBetween(1, 100),
            'amount'=> $this->faker->unique()->numberBetween(1, 5000),
            'product_status'=> $this->faker->randomElement(['draft', 'publish']),
        ];
    }
}
