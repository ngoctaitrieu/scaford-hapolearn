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
            'course_name' => $this->faker->name(),
            'image' => $this->faker->imageUrl(100, 100),
            'description' => $this->faker->text(200),
            'price' => $this->faker->numberBetween(5000, 50000)
        ];
    }
}
