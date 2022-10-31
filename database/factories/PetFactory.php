<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Implementing the factories ability to auto-generate new database/API entries
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function definition()
    {
        return [
            'species' => fake()->word(),
            'breed' => fake()->word(),
            'description' => fake()->text(),
            'name' => fake()->name(),
            'age' => fake()->randomFloat(),
        ];
    }
}
