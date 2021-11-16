<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnggotaOrganisasiLainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_organisasi' => $this->faker->city() . ' Community',
            'jabatan' => collect(['Anggota', 'Pimpinan', 'Ketua', 'Sekretaris', 'Bendahara'])->random(),
            'masa_jabat_awal' => $this->faker->date('Y-m-d'),
            'masa_jabat_akhir' => $this->faker->date('Y-m-d'),
        ];
    }
}
