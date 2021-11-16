<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no_kartanu' => $this->faker->randomNumber(9, true),
            'no_ktp' => $this->faker->nik(),
            'nama' => $this->faker->name(),
            'jenis_kelamin' => collect(['L', 'P'])->random(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date('Y-m-d'),
            'no_telepon' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'foto_diri' => 'user-default.png',
            'scan_ktp' => 'img-unavailable.png',
            'scan_kartanu' => 'img-unavailable.png',
            'alamat' => $this->faker->address(),
            'kelurahan' => $this->faker->city(),
            'kecamatan' => $this->faker->city(),
            'kabupaten' => $this->faker->city(),
            'alamat_maps' => $this->faker->latitude() . '|' . $this->faker->longitude(),
            'status_menikah' => collect(['Menikah', 'Belum menikah'])->random(),
            'jumlah_anggota_keluarga' => $this->faker->randomDigit(),
            'aktifitas_nu' => collect(['MWC NU', 'PCNU', 'PBNU', 'LPNU', 'LAZISNU', 'PCINU', 'PRNU'])->random(),
            'jabatan_nu' => collect(['Anggota', 'Pimpinan', 'Ketua', 'Sekretaris', 'Bendahara'])->random(),
            'asuransi_kesehatan' => 'Tidak ada',
        ];
    }
}
