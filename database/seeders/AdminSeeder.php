<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Kang Admin',
            'email' => 'yannfuusenpai@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => true
        ]);
    }
}
