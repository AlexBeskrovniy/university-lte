<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_id' => $this->faker->numberBetween(1, 10),
            'subject_id' => $this->faker->numberBetween(1, 10),
            'group_id' => $this->faker->numberBetween(1, 10),
            'educator_id' => $this->faker->numberBetween(1, 10),
            'date' => $this->faker->date('Y-m-d'),
            'day_of_week' => $this->faker->randomElement(['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница',]),
            'time' => $this->faker->randomElement(['08:00', '09:00', '10:00', '11:00', '12::00', '13:00', '14:00']),
        ];
    }
}
