<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name' => 'Класична чоловіча стрижка',
                'base_price' => 250.00,
                'category' => 'стрижка',
                'duration_min' => 30,
            ],
            [
                'name' => 'Борода + контур',
                'base_price' => 160.00,
                'category' => 'борода',
                'duration_min' => 25,
            ],
            [
                'name' => 'Стильний комплекс',
                'base_price' => 370.00,
                'category' => 'комплекс',
                'duration_min' => 50,
            ],
            [
                'name' => 'Авангардна стрижка',
                'base_price' => 270.00,
                'category' => 'стрижка',
                'duration_min' => 35,
            ],
            [
                'name' => 'Простий тримінг',
                'base_price' => 140.00,
                'category' => 'борода',
                'duration_min' => 20,
            ],
            [
                'name' => 'Колор-тюнінг',
                'base_price' => 420.00,
                'category' => 'колористика',
                'duration_min' => 70,
            ],
            [
                'name' => 'Преміум стрижка',
                'base_price' => 300.00,
                'category' => 'стрижка',
                'duration_min' => 40,
            ],
            [
                'name' => 'Борода + стиль',
                'base_price' => 180.00,
                'category' => 'борода',
                'duration_min' => 25,
            ],
            [
                'name' => 'Комплекс Deluxe',
                'base_price' => 420.00,
                'category' => 'комплекс',
                'duration_min' => 55,
            ],
        ]);
    }
}