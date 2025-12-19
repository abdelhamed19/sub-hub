<?php

namespace Database\Factories;

use App\Enums\PlanType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 500),
            'compare_price' => $this->faker->randomFloat(2, 5, 600),
            'duration_days' => $this->faker->numberBetween(30, 365),
            'is_active' => $this->faker->boolean(80),
            'features' => $this->faker->randomElements(['Feature A', 'Feature B', 'Feature C'], $this->faker->numberBetween(1, 3)),
            'type' => $this->faker->randomElement(PlanType::options())
        ];
    }
}
