<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'classroom_code' => $this->faker->unique()->word,
            'classroom_name' => $this->faker->unique()->word,
            'classroom_description' => $this->faker->sentence,
        ];
    }
}
