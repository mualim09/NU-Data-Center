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
            'pendidikan_terakhir' => 'SMA',
            'jurusan' => 'IPA',
            'pendidikan_pesantren' => $this->faker->randomDigit() . ' Tahun'
        ];
    }
}
