<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama_lengkap' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'avatar' => 'images/user-default.png',
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address(),
            'kabupaten' => $this->faker->city(),
            'kecamatan' => $this->faker->city(),
            'kelurahan' => $this->faker->city(),
            'nomor_hp' => $this->faker->phoneNumber(),
            'nomor_ktp' => $this->faker->nik(),
            'remember_token' => Str::random(10),
            'admin_username' => '',
        ];
    }
}
