<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        $appointments = [];

        // Створити кілька записів на наступні дні
        $baseDate = Carbon::now()->addDays(1); // Завтра

        for ($i = 0; $i < 10; $i++) {
            $date = $baseDate->copy()->addDays(rand(0, 7));
            $hour = rand(9, 17);
            $minute = rand(0, 3) * 15; // 0, 15, 30, 45

            $appointments[] = [
                'barber_id' => rand(1, 2), // Тільки працюючі барбари
                'service_id' => rand(1, 3),
                'start_time' => $date->setHour($hour)->setMinute($minute),
                'customer_name' => 'Клієнт ' . ($i + 1),
                'customer_phone' => '+38050' . str_pad(rand(1000000, 9999999), 7, '0', STR_PAD_LEFT),
                'customer_note' => 'Тестовий запис',
                'status' => ['active', 'confirmed'][rand(0, 1)],
                'gcal_sync_id' => 'gcal_' . uniqid(),
                'created_at' => now(),
            ];
        }

        DB::table('appointments')->insert($appointments);
    }
}