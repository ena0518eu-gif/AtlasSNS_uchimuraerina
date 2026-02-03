<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'Taro Yamada', // ← name からusername に変更
            'email' => 'taro@example.com',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'Hanako Suzuki', // ←usernameに変更
            'email' => 'hanako@example.com',
            'password' => Hash::make('securepass456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
