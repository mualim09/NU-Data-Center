<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'jenis_kelamin' => 'L',
            'nama_lengkap' => 'M. Badar Wildanie',
            'avatar' => 'storage/admin/avatar/1637058920_73ede46ab411bbc31f20.jpg',
            'tempat_lahir' => 'Malang',
            'tanggal_lahir' => '1999-07-28',
            'alamat' => 'Sistem',
            'nomor_hp' => '082228111059',
            'nomor_ktp' => '3507102807990004',
            'remember_token' => 'YW5qYXkxNjM2OTc4OTE3LTY4Mg==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'yusuf99',
            'password' => Hash::make('admin'),
            'jenis_kelamin' => 'L',
            'nama_lengkap' => 'M Yusuf Azwar Anas',
            'avatar' => 'storage/admin/avatar/1619444571_e8bfc88009818b76db7d.jpg',
            'tempat_lahir' => 'Jombang',
            'tanggal_lahir' => '1979-04-13',
            'alamat' => 'Sistem',
            'kabupaten' => 'MALANG',
            'kecamatan' => 'GONDANGLEGI',
            'kelurahan' => 'PUTAT LOR',
            'nomor_hp' => '082141411620',
            'nomor_ktp' => '3507091304790002',
            'remember_token' => 'YW5qYXkxNjI5MjYzODQwLTM0',
            'admin_username' => '',
        ]);
    }
}
