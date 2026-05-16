<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarberServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('barber_services')->insert([
            [
                'barber_id' => 1,
                'service_id' => 1,
                'personal_price' => 250.00,
                'personal_duration' => 30,
            ],
            [
                'barber_id' => 1,
                'service_id' => 2,
                'personal_price' => 160.00,
                'personal_duration' => 25,
            ],
            [
                'barber_id' => 1,
                'service_id' => 3,
                'personal_price' => 370.00,
                'personal_duration' => 50,
            ],
            [
                'barber_id' => 2,
                'service_id' => 4,
                'personal_price' => 270.00,
                'personal_duration' => 35,
            ],
            [
                'barber_id' => 2,
                'service_id' => 5,
                'personal_price' => 140.00,
                'personal_duration' => 20,
            ],
            [
                'barber_id' => 2,
                'service_id' => 6,
                'personal_price' => 420.00,
                'personal_duration' => 70,
            ],
            [
                'barber_id' => 3,
                'service_id' => 7,
                'personal_price' => 300.00,
                'personal_duration' => 40,
            ],
            [
                'barber_id' => 3,
                'service_id' => 8,
                'personal_price' => 180.00,
                'personal_duration' => 25,
            ],
            [
                'barber_id' => 3,
                'service_id' => 9,
                'personal_price' => 420.00,
                'personal_duration' => 55,
            ],
        ]);
    }
}