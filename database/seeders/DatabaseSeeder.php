<?php

namespace Database\Seeders;

use Database\Seeders\UsersTableSeeder as UsersTableSeeder;
use Database\Seeders\CoursesTableSeeder as CoursesTableSeeder;
use Database\Seeders\CourseUsersTableSeeder as CourseUsersTableSeeder;
use Database\Seeders\LessonsTableSeeder as LessonsTableSeeder;
use Database\Seeders\ProgramsTableSeeder as ProgramsTableSeeder;
use Database\Seeders\ReviewsTableSeeder as ReviewsTableSeeder;
use Database\Seeders\TagsTableSeeder as TagsTableSeeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(CourseUsersTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
    }
}
