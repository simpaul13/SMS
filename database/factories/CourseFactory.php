<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_code' => $this->faker->unique()->word,
            'course_name' => $this->faker->unique()->word,
            'course_description' => $this->faker->sentence,
        ];
    }
}
