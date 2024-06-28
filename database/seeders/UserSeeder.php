<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create([
            'name'=>'Admin Dashboard',
            'level' =>'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),

        ]);
    }
}
