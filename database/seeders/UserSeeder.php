<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@gmail.com',
            'nama' => 'admin',
            'password' => 'admin',
            'role' => 'Admin',
            'status' => '-'
        ]);
        User::create([
            'email' => 'bagas@gmail.com',
            'nama' => 'Bagas Rizkiyanto',
            'password' => '123',
            'role' => 'Mahasiswa',
            'status' => 'Belum mengajukan'
        ]);
        User::create([
            'email' => 'lea@gmail.com',
            'nama' => 'Fillea Rethia Yuma',
            'password' => '123',
            'role' => 'Mahasiswa',
            'status' => 'Belum mengajukan'
        ]);
    }
}
