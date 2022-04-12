<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_number' => $this->faker->unique()->randomNumber(9),
            'student_firstname' => $this->faker->firstName,
            'student_lastname' => $this->faker->lastName,
            'student_username' => $this->faker->unique()->userName,
            'student_email' => $this->faker->unique()->email,
            'student_password' => bcrypt('password'),
            'student_phone' => $this->faker->phoneNumber,
            'student_address' => $this->faker->address,
            'student_city' => $this->faker->city,
            'student_state' => $this->faker->state,
            'student_zip' => $this->faker->postcode,
            'student_country' => $this->faker->country,
            'student_status' => 'active',
            'student_gender' => $this->faker->randomElement($array = array('Male', 'Female')),
            'student_birthday' => $this->faker->dateTimeBetween('-30 years', '-20 years')->format('Y-m-d'),
        ];
    }
}
