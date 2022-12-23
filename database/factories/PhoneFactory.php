<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'telephone'  => $this->faker->phoneNumber(),
            'cellphone1' => $this->faker->phoneNumber(),
            'cellphone2' => $this->faker->phoneNumber(),
            'user_id'    => User::factory()
        ];
    }
}
