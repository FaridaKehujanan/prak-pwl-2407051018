<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel;
use App\Models\Kelas;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $dosen = UserModel::firstOrCreate(
            ['email' => 'dosen@example.com'],
            [
                'name' => 'DosenIlkomp',
                'npm' => '1234567890',
                'email' => 'dosen@example.com',
                'password' => Hash::make('password123'),
                'kelas_id' => Kelas::where('nama_kelas', 'B')->first()->id
            ]
        );
        $dosen->assignRole('dosen');

        $mahasiswa = UserModel::firstOrCreate(
            ['email' => 'mahasiswa@example.com'],
            [
                'name' => 'MahasiswaIlkomp',
                'npm' => '1234567891',
                'email' => 'mahasiswa@example.com',
                'password' => Hash::make('password123'),
                'kelas_id' => Kelas::where('nama_kelas', 'A')->first()->id
            ]
        );
        $mahasiswa->assignRole('mahasiswa');
    }
}