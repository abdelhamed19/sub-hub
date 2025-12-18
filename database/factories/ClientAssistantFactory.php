<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientAssistant>
 */
class ClientAssistantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => \App\Models\Client::factory(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => 'password', // Will be hashed by the model's mutator
            'phone' => $this->faker->phoneNumber(),
            'is_active' => $this->faker->boolean(80),
            'last_login_at' => null,
            'role' => $this->faker->randomElement(['admin', 'support', 'viewer']),
            'image' => null,
        ];
    }
}
