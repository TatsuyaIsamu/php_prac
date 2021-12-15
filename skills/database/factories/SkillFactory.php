<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'skill_name' => $this->faker->name,
            'skill_status' => $this->faker->randomElement([1,2,3,4,5]),
            'experience_years' => $this->faker->randomNumber(3),
            'remarks' => $this->faker->realText(1000),
        ];
    }
}
