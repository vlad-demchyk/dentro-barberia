<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Шампунь для чоловіків',
                'description' => 'Професійний шампунь для щоденного використання.',
                'price' => 150.00,
                'image_url' => '/storage/products/shampoo.jpg',
                'category' => 'догляд',
                'stock_quantity' => 50,
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Гель для бороди',
                'description' => 'Фіксуючий гель для укладання бороди.',
                'price' => 120.00,
                'image_url' => '/storage/products/beard_gel.jpg',
                'category' => 'догляд',
                'stock_quantity' => 30,
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Набір для гоління',
                'description' => 'Комплект з бритвою, кремом та післяголінням.',
                'price' => 250.00,
                'image_url' => '/storage/products/shaving_kit.jpg',
                'category' => 'інструменти',
                'stock_quantity' => 20,
                'is_active' => true,
                'created_at' => now(),
            ],
        ]);
    }
}