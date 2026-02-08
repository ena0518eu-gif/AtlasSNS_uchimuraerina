<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddIconsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('icons')->insert([
            [
                'filename' => 'icon2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'icon3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'icon4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'icon5.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'icon6.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'icon7.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
