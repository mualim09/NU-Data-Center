<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnggotaPendidikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pendidikan_terakhir' => collect(['SD/MI', 'SMP/MTs', 'SMA/MA', 'SMK/MAK', 'S1', 'S2', 'S3'])->random(),
            'jurusan' => collect(
                [
                    'IPA',
                    'IPS',
                    'Ekonomi Bisnis',
                    'Manajemen',
                    'Teknik Sepeda Motor',
                    'Otomotif',
                    'Pendidikan',
                    'Tata Boga',
                    'Tata Busana'
                ]
            )->random(),
            'pendidikan_pesantren' => $this->faker->randomDigit() . ' Tahun'
        ];
    }
}
