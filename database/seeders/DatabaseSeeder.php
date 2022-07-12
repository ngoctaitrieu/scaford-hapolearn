<?php

namespace Database\Seeders;

use Database\Seeders\UsersTableSeeder as UsersTableSeeder;
use Database\Seeders\CoursesTableSeeder as CoursesTableSeeder;
use Database\Seeders\CourseUsersTableSeeder as CourseUsersTableSeeder;
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
    }
}
