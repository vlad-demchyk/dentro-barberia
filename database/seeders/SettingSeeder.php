<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'key' => 'hero_banner',
                'value' => json_encode([
                    'title' => 'Ласкаво просимо до нашого барбершопу',
                    'subtitle' => 'Професійні послуги для справжніх чоловіків',
                    'image_url' => '/storage/banners/hero.jpg',
                    'active' => true,
                ]),
            ],
            [
                'key' => 'evidenza_banners',
                'value' => json_encode([
                    [
                        'title' => 'Акція: -20% на комплекс',
                        'image_url' => '/storage/banners/evidenza1.jpg',
                        'active_from' => '2026-05-01',
                        'active_to' => '2026-05-31',
                        'link' => '/services',
                    ],
                    [
                        'title' => 'Новий майстер приєднався',
                        'image_url' => '/storage/banners/evidenza2.jpg',
                        'active_from' => '2026-05-10',
                        'active_to' => '2026-05-20',
                        'link' => '/barbers/2',
                    ],
                ]),
            ],
            [
                'key' => 'contact_info',
                'value' => json_encode([
                    'phone' => '+380501234567',
                    'email' => 'info@barbershop.ua',
                    'address' => 'Київ, вул. Хрещатик, 1',
                ]),
            ],
        ]);
    }
}