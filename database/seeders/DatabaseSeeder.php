<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BarberSeeder::class,
            ServiceSeeder::class,
            BarberServiceSeeder::class,
            WorkingHourSeeder::class,
            TemplateSeeder::class,
            SettingSeeder::class,
            AppointmentSeeder::class,
            ClientSeeder::class,
            ProductSeeder::class,
            NewsSeeder::class,
        ]);
    }
}