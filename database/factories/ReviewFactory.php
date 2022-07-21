<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Review::class;

    public function definition()
    {
        return [
            'course_id' => $this->faker->randomElement(Course::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'message' => $this->faker->text(200),
            'rate' => $this->faker->numberBetween(1, 5),
        ];
    }
}
