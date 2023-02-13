<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Roast>
 */
class RoastFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'availability' => $this->faker->boolean(),
            'capacity' => $this->faker->numberBetween(1, 8),
            'bank_account' => $this->faker->bankAccountNumber(),
            'target_fish' => $this->faker->name(),
            'wish_fish' => $this->faker->name(),
            'our_support' => $this->faker->sentence(),
            'ship_id' => $this->faker->numberBetween(1, 100),
            'owner_id' => $this->faker->numberBetween(1, 35),
        ];
    }
}
