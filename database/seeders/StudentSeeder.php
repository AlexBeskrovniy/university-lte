<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = User::factory()->count(150)->create();

        Role::create([
            'name' => 'student',
        ]);

        foreach($students as $student){
            $student->assignRole('student');
        }
    }
}
