<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Petugas;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Petugas::create([
            'id' => Str::uuid(),
            'email' => 'master@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name' => 'Mr. Dev',
            'role' => 'master',
        ]);
        Petugas::create([
            'id' => Str::uuid(),
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name' => 'Mr. Admin',
            'role' => 'admin',
        ]);
        Petugas::create([
            'id' => Str::uuid(),
            'email' => 'admin2@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name' => 'Mrs. Admin',
            'role' => 'admin',
        ]);
        Petugas::create([
            'id' => Str::uuid(),
            'email' => 'petugas@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name' => 'Mr. Petugas',
            'role' => 'petugas',
        ]);
        Petugas::create([
            'id' => Str::uuid(),
            'email' => 'petugas2@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name' => 'Mrs. Petugas',
            'role' => 'petugas',
        ]);
    }
}
