<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price_type' => $this->faker->randomElement($array = array('group','single')),
            'price' => $this->faker->randomDigit(100, 5000),
            'roast_id' => $this->faker->randomDigit(1, 150),
        ];
    }
}
