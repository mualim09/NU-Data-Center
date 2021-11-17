<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnggotaPekerjaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenis_profesi' => collect(['Guru', 'Petani', 'Wiraswasta', 'Buruh'])->random(),
            'alamat_kantor' => $this->faker->address(),
            'penghasilan_perbulan' => collect([
                '< Rp. 1.000.000',
                '> Rp. 1.000.000 dan < Rp. 5.000.000,-',
                '> Rp. 5.000.000 dan < Rp. 15.000.000,-',
                '> Rp. 15.000.000',
            ])->random()
        ];
    }
}
