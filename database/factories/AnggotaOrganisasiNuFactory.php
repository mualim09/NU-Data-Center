<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnggotaOrganisasiNuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'struktur_organisasi' => collect(['MWC NU', 'PCNU', 'PBNU', 'LPNU', 'LAZISNU', 'PCINU', 'PRNU'])->random(),
            'jabatan' => collect(['Anggota', 'Pimpinan', 'Ketua', 'Sekretaris', 'Bendahara'])->random(),
            'masa_jabat_awal' => $this->faker->date('Y-m-d'),
            'masa_jabat_akhir' => $this->faker->date('Y-m-d'),
        ];
    }
}
