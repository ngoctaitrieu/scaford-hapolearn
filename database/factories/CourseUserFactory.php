<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = CourseUser::class;

    public function definition()
    {
        return [
            'course_id' => $this->faker->randomElement(Course::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id'))
        ];
    }
}
