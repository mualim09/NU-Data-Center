<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PKPFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'angkatan_pkp' => $this->faker->randomDigit(),
            'lokasi_kegiatan' => $this->faker->city(),
            'waktu_kegiatan' => $this->faker->dateTime()
        ];
    }
}
