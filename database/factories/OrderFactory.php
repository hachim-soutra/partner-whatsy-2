<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => fake()->name(),
            'url' => fake()->url(),
            'parameters' => fake()->name(),
            'client_id' => 1,
            'secret' => '959472bbb7608e83ad3757466dffda448035bbf4',
        ];
    }
}
