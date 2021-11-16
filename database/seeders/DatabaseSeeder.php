<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\AnggotaOrganisasiLain;
use App\Models\AnggotaOrganisasiNu;
use App\Models\AnggotaPekerjaan;
use App\Models\AnggotaPendidikan;
use App\Models\PKP;
use App\Models\Pondok;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        $pondok = Pondok::factory()->count(5)->create();
        $pkp = PKP::factory()->count(5)->create();
        for ($i = 0; $i <= 10; $i++) {
            $pendidikan = AnggotaPendidikan::factory()
                ->for($pondok[rand(0, 5 - 1)])
                ->create();
            $pekerjaan = AnggotaPekerjaan::factory()->create();
            $anggota = Anggota::factory()
                ->has(AnggotaOrganisasiLain::factory()->count(rand(1, 3)), 'organisasiLain')
                ->has(AnggotaOrganisasiNu::factory()->count(rand(1, 3)), 'organisasiNu')
                ->for($pendidikan, 'pendidikan')
                ->for($pekerjaan, 'pekerjaan')
                ->for($pkp[rand(0, 5 - 1)])
                ->create();
        }
    }
}