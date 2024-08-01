<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::UpdateOrCreate([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => '$2y$12$aJGyaGCpf/NPlweC5btlhuCWA9.1H.yQgm1RN1dtuk9rRukXgSUYC',
        ]); 
    }
}
