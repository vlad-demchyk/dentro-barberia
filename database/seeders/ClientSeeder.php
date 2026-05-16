<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'name' => 'Іван Петрович',
                'phone' => '+380501234567',
                'email' => 'ivan@example.com',
                'notes' => 'Любить класичні стрижки. Алергія на певні продукти.',
                'total_visits' => 15,
                'last_visit' => '2026-05-10',
                'rating' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Олексій Сидоров',
                'phone' => '+380507654321',
                'email' => 'oleksiy@example.com',
                'notes' => 'Регулярний клієнт. Віддає перевагу Максиму.',
                'total_visits' => 8,
                'last_visit' => '2026-05-05',
                'rating' => 4,
                'created_at' => now(),
            ],
            [
                'name' => 'Дмитро Коваленко',
                'phone' => '+380509876543',
                'email' => 'dmytro@example.com',
                'notes' => 'Новий клієнт. Інтересується колористикою.',
                'total_visits' => 2,
                'last_visit' => '2026-05-12',
                'rating' => 5,
                'created_at' => now(),
            ],
        ]);
    }
}