<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarberSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('barbers')->insert([
            [
                'name' => 'Олександр Петренко',
                'short_bio' => 'Досвідчений барбер з 5 роками практики. Спеціалізуюся на класичних стрижках та бороді.',
                'avatar_url' => '/storage/avatars/barber1.jpg',
                'template_id' => 1,
                'is_working' => true,
                'start_date' => '2023-01-01',
                'end_date' => null,
                'holiday_reason' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'Максим Іваненко',
                'short_bio' => 'Молодий майстер з сучасним підходом. Люблю експериментувати з стилями.',
                'avatar_url' => '/storage/avatars/barber2.jpg',
                'template_id' => 2,
                'is_working' => true,
                'start_date' => '2023-03-15',
                'end_date' => null,
                'holiday_reason' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'Андрій Коваленко',
                'short_bio' => 'Професіонал у колористиці волосся. 8 років досвіду.',
                'avatar_url' => '/storage/avatars/barber3.jpg',
                'template_id' => 1,
                'is_working' => false,
                'start_date' => '2022-06-01',
                'end_date' => '2026-05-20',
                'holiday_reason' => 'Відпустка',
                'created_at' => now(),
            ],
        ]);
    }
}