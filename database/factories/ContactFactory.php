<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
    */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'contact' => fake()->unique()->numerify('#########'),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}