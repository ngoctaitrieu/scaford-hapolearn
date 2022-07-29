<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use App\Models\User;

class CourseTeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->randomElement(Course::pluck('id')),
            'user_id' => $this->faker->randomElement(User::where('role', config('roles.teacher'))->pluck('id')),
        ];
    }
}
