<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Program::class;

    public function definition()
    {
        return [
            'lesson_id' => $this->faker->randomElement(Lesson::pluck('id')),
            'name' => $this->faker->name(),
            'source_code' => 'https://drive.google.com/drive/u/0/folders/1wPtHm08iEizwLeP9d0uuvX9yiTzyBT8J',
            'type' => 'Folder',
        ];
    }
}
