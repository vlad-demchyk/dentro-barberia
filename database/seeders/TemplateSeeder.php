<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('templates')->insert([
            [
                'code_name' => 'classic_white',
                'base_css_content' => '.barber-card { background-color: white; border: 1px solid #ddd; border-radius: 8px; } .barber-card h2 { color: #333; }',
                'priority_order' => 1,
            ],
            [
                'code_name' => 'modern_black',
                'base_css_content' => '.barber-card { background-color: #222; color: white; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.3); } .barber-card h2 { color: #fff; }',
                'priority_order' => 2,
            ],
        ]);
    }
}