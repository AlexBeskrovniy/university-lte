<?php

namespace Database\Seeders;

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
        $this->call([
            SubjectSeeder::class,
            GroupSeeder::class,
            RoomSeeder::class,
            EducatorSeeder::class,
            AdminSeeder::class,
            StudentSeeder::class,
            LessonSeeder::class,
        ]);
    }
}
