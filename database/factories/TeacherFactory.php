<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teacher_number' => $this->faker->unique()->randomNumber(9),
            'teacher_firstname' => $this->faker->firstName,
            'teacher_lastname' => $this->faker->lastName,
            'teacher_username' => $this->faker->unique()->userName,
            'teacher_email' => $this->faker->unique()->email,
            'teacher_password' => bcrypt('password'),
            'teacher_phone' => $this->faker->phoneNumber,
            'teacher_address' => $this->faker->address,
            'teacher_city' => $this->faker->city,
            'teacher_state' => $this->faker->state,
            'teacher_zip' => $this->faker->postcode,
            'teacher_status' => 'active',
            'teacher_gender' => $this->faker->randomElement($array = array('Male', 'Female')),
            'teacher_birthday' => $this->faker->dateTimeBetween('-40 years', '-25 years')->format('Y-m-d'),
        ];
    }
}
