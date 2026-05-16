<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkingHourSeeder extends Seeder
{
    public function run(): void
    {
        $workingHours = [];

        // Для кожного барбера (1-3)
        for ($barberId = 1; $barberId <= 3; $barberId++) {
            // Понеділок - П'ятниця: 9:00 - 18:00 з обідом 13:00-14:00
            for ($day = 1; $day <= 5; $day++) {
                $workingHours[] = [
                    'barber_id' => $barberId,
                    'day_of_week' => $day,
                    'start_time' => '09:00',
                    'end_time' => '18:00',
                    'break_start' => '13:00',
                    'break_end' => '14:00',
                ];
            }
            // Субота: 9:00 - 16:00 без обіду
            $workingHours[] = [
                'barber_id' => $barberId,
                'day_of_week' => 6,
                'start_time' => '09:00',
                'end_time' => '16:00',
                'break_start' => null,
                'break_end' => null,
            ];
            // Неділя: вихідний
        }

        DB::table('working_hours')->insert($workingHours);
    }
}