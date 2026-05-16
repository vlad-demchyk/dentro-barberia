<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('news')->insert([
            [
                'title' => 'Новий майстер приєднався до команди!',
                'content' => 'Раді представити вам Максима Іваненка, нашого нового барбера. Він спеціалізується на сучасних стилях.',
                'image_url' => '/storage/news/new_barber.jpg',
                'published_at' => '2026-05-01',
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Акція місяця: -20% на комплексні послуги',
                'content' => 'Цілий місяць отримуйте знижку 20% на комплекс стрижки + бороди.',
                'image_url' => '/storage/news/discount.jpg',
                'published_at' => '2026-05-05',
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Відкрито запис на курси барберів',
                'content' => 'Навчаємо нових майстрів. Деталі за телефоном.',
                'image_url' => '/storage/news/courses.jpg',
                'published_at' => '2026-05-10',
                'is_active' => true,
                'created_at' => now(),
            ],
        ]);
    }
}