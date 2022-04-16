<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject_code' => $this->faker->unique()->word,
            'subject_name' => $this->faker->unique()->word,
            'subject_description' => $this->faker->sentence,
        ];
    }
}
