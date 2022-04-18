<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;

class EducatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Role::create([
            'name' => 'educator',
        ]);

        for($i = 0; $i < 10; $i++){
            $educator = User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => bcrypt('55555555'),
                'subject_id' => $faker->unique()->numberBetween(1, 10),
            ]);

            $educator->assignRole('educator');
        }
    }
}
