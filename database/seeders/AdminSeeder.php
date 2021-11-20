<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

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
            'username' => 'achshofaull',
            'password' => '$2y$10$/unbFh5W2e.IPEPUCdH2GuQh9T0qS8pDd1TmD2cwGhWujNKtYJ4hW',
            'nama_lengkap' => 'ACHMAD SHOFAUL HUDA',
            'avatar' => 'images/user-default.png',
            'tanggal_lahir' => '1994-11-01',
            'alamat' => 'Dsn. Maron RT.19 RW.09 Pujon Lor Kec. Pujon - Kab. Malang.',
            'nomor_hp' => '085233443818',
            'nomor_ktp' => '3507560111940005',
            'remember_token' => 'YW5qYXkxNjE5MTAzMjg3LTMzMQ==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'admintest1',
            'password' => '$2y$10$E2X12clImzHk2TKZmL0cFeZXC9Q8jh6/smUodEXhmtlII7YKb21gW',
            'nama_lengkap' => 'admintest',
            'avatar' => 'storage/admin/avatar/1619071251_1cd859034f679f489055.jpg',
            'tanggal_lahir' => '2021-04-07',
            'alamat' => 'System',
            'nomor_hp' => '082123123123',
            'nomor_ktp' => '35000000000001',
            'remember_token' => 'YW5qYXkxNjE5MDcxNTE1LTE3Ng==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'asrofi',
            'password' => '$2y$10$Q4etpJFNIAQAPWClSr5XP.335DIxrtNW3PxDY3i21JVNqbcoQGpFK',
            'nama_lengkap' => 'Muhammad Amin Asrofi, SH.MM.',
            'avatar' => 'storage/admin/avatar/1619056744_2ec10cfd34893fea69e7.jpeg',
            'tanggal_lahir' => '1991-05-09',
            'alamat' => 'BANTUR',
            'nomor_hp' => '082132533365',
            'nomor_ktp' => '3507030905910001',
            'remember_token' => 'YW5qYXkxNjE5MDcwMTQyLTQ2OA==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' =>'deny',
            'password' =>'$2y$10$g7dFGLIS1bv5dX3LKjkI3em28v6mzFcB90l/di7lYYSCWqTorRogy',
            'nama_lengkap' =>'Deny Dwy Adriyanto',
            'avatar' => 'images/user-default.png',
            'tanggal_lahir' =>'1976-07-14',
            'alamat' =>'Jln. Raden Patah RT 26 / RW 03 Suko Sumberpucung',
            'nomor_hp' =>'081358069080',
            'nomor_ktp' =>'',
            'remember_token' =>'YW5qYXkxNjE5ODUxNTQzLTg3Mw==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'ilham',
            'password' => '$2y$10$kbQpvzSJ63lfWXzhcBhXHuTj1dhB4Sql.PwCYzSD581sg77dJII2K',
            'nama_lengkap' => 'Ilham Habieb',
            'avatar' => 'images/user-default.png',
            'alamat' => 'Malang',
            'nomor_hp' => '',
            'nomor_ktp' => '',
            'remember_token' => 'YW5qYXkxNjI3OTkxMjcxLTQ2OA==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'komarudin',
            'password' => '$2y$10$lTthScwbqY5OWioiCr8IZOpFRulsd/eg.Ahi1tEU2smwU897XM2ve',
            'nama_lengkap' => 'Komarudin',
            'avatar' => 'storage/admin/avatar/1619151691_eaf47179c16180d9751d.jpg',
            'tanggal_lahir' => '1986-08-15',
            'alamat' => 'Dsn. Sumbersari RT 59 RW 17 Ds. Sumberejo Kec. Gedangan Kab Malang',
            'nomor_hp' => '082337778917',
            'nomor_ktp' => '3507291508860004',
            'remember_token' => 'YW5qYXkxNjE5NjIyNDIyLTI0Ng==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'lpnu5758',
            'password' => '$2y$10$VKPtHOxohg46ua06RGq2FeF4DcuURPT6Qtcg2iwXkrOgaXfOTdO5e',
            'nama_lengkap' => 'lpnu5758',
            'avatar' => 'images/user-default.png',
            'alamat' => '',
            'nomor_hp' => '',
            'nomor_ktp' => '',
            'remember_token' => 'YW5qYXkxNjE5MjM3MDM1LTM3Mg==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'lpnuampelgading',
            'password' => '$2y$10$I.ICizSE4LML187IKbNK1uz2zCrr/uSDCXsYT6bfX6eM45wld1M4.',
            'nama_lengkap' => 'Andika Bramantara',
            'avatar' => 'storage/admin/avatar/1619131957_2f927651aa828a6509d7.jpg',
            'tanggal_lahir' => '1991-05-10',
            'alamat' => 'JL. SWIDAKAN KRAJAN RT.06 RW.02 DESA TAMANASRI KECAMATAN AMPELGADING',
            'nomor_hp' => '082332630448',
            'nomor_ktp' => '3507061005910001',
            'remember_token' => 'YW5qYXkxNjM1MTYxNTk3LTE0',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'lpnubululawang',
            'password' => '$2y$10$I7k9bhf/hKD7c9xyyzUVSu3BUnQT1CQfIYKT196Px7KIYhNor5BtO',
            'nama_lengkap' => 'lpnubululawang',
            'avatar' => 'storage/admin/avatar/1619526558_f71fa4e4658704f3bc15.jpg',
            'alamat' => '',
            'nomor_hp' => '',
            'nomor_ktp' => '',
            'remember_token' => '',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'lpnudonomulyo',
            'password' => '$2y$10$saUyTXJTJTWm4FaExhyBW.l3qcBVBugUiFnfYFew8gypOdXXh7cai',
            'nama_lengkap' => 'lpnudonomulyo',
            'avatar' => 'images/user-default.png',
            'alamat' => '',
            'nomor_hp' => '',
            'nomor_ktp' => '',
            'remember_token' => 'YW5qYXkxNjI5OTU5NDIyLTI1OQ==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'lpnugondanglegi',
            'password' => '$2y$10$uxcJNBfhzLLpFKE1sysIjePJ/WCTMO7AFQEm61Abb6DgY1zBvTlWK',
            'nama_lengkap' => 'lpnugondanglegi',
            'avatar' => 'storage/admin/avatar/1619148309_3fa641bb211d1465f317.jpg',
            'tanggal_lahir' => '2021-03-27',
            'alamat' => 'Jl. Hanyamwuruk Gondanglegi malang',
            'nomor_hp' => '082232945733',
            'nomor_ktp' => '3507105509920004',
            'remember_token' => 'YW5qYXkxNjE5MTg5NzgxLTcyNg==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'lpnukarangploso',
            'password' => '$2y$10$kgdqov2ZxRwxwmx/BAj3FOxvTYzUpBH61FK/7gbGBvg.jRm4QeZcG',
            'nama_lengkap' => 'lpnukarangploso',
            'avatar' => 'images/user-default.png',
            'alamat' => '',
            'nomor_hp' => '',
            'nomor_ktp' => '',
            'remember_token' => '',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'lpnungajum',
            'password' => '$2y$10$fIceMEl0XKZTuoy3kSSGpOTofTnSJx5yT02iFKnqgO.b.mN5s1gj6',
            'nama_lengkap' => 'Triya Intan Fandini',
            'avatar' => 'storage/admin/avatar/1618986312_e5cc566259fa2d9a6d72.jpeg',
            'tanggal_lahir' => '1999-10-18',
            'alamat' => 'Dusun Nanasan RT.2 RW.6 Kecamatan Ngajum',
            'nomor_hp' => '083834795963',
            'nomor_ktp' => '3507205810990001',
            'remember_token' => 'YW5qYXkxNjI4NzY3NDQ4LTgx',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'lpnupakisaji',
            'password' =>  '$2y$10$ReK5/4TnaAZz4zypood/Se4lM0t51QpPObJ/Gf2SD5OBe5cAI5xnC',
            'nama_lengkap' => 'LPNU Pakisaji',
            'avatar' => 'storage/admin/avatar/1628691317_fdba54454ca53fb3cc1d.jpg',
            'tanggal_lahir' => '1973-10-19',
            'alamat' => 'Dusun Sonotengah, RT.66 RW.14 Desa Kebunagung Kec.Pakisaji Kab.Malang',
            'nomor_hp' => '082245286224',
            'nomor_ktp' => '3507191910730002',
            'remember_token' => 'YW5qYXkxNjI4NjkwMDQ3LTc4Mw==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'lpnusingosari',
            'password' => '$2y$10$NTWAU83.6Gl3mYaT7UbA6.e8mcWQJ5B7eE9d2H1NjeIiK7seuacFS',
            'nama_lengkap' => 'lpnusingosari',
            'avatar' => 'images/user-default.png',
            'alamat' => '',
            'nomor_hp' => '',
            'nomor_ktp' => '',
            'remember_token' => 'YW5qYXkxNjE5NTA0MzY1LTQxMg==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'lpnusingosari2',
            'password' => '$2y$10$mvmiApJCCZ1bAZK/1Py8cOkrIxL3fby1llx/C.pKwdOR9HH8Aq1Um',
            'nama_lengkap' => 'lpnusingosari2',
            'avatar' => 'images/user-default.png',
            'alamat' => '',
            'nomor_hp' => '',
            'nomor_ktp' => '',
            'remember_token' => 'YW5qYXkxNjE5NTIzMzg1LTIzNQ==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'lpnuturen',
            'password' => '$2y$10$FVq59IwL3F3X7lFyf2k.aeFqh6/cKZygfUlxNH0WKPQBfMufgFFZW',
            'nama_lengkap' => 'Moh Hisam Kholili',
            'avatar' => 'storage/admin/avatar/1619128528_c5c2392690f9afc67d5c.jpg',
            'tanggal_lahir' => '1981-01-16',
            'alamat' => '',
            'nomor_hp' => '085234041582',
            'nomor_ktp' => '3515021601810002',
            'remember_token' => 'YW5qYXkxNjE5MTI4NTYyLTc3Ng==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'lpnuwajak',
            'password' => '$2y$10$791YlR8MFYmYrecRVtjfFOxPahr8vbRzUz3wpo3vpSlxVwdeCDQE2',
            'nama_lengkap' => 'lpnuwajak',
            'avatar' => 'images/user-default.png',
            'alamat' => '',
            'nomor_hp' => '',
            'nomor_ktp' => '',
            'remember_token' => '',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'muhaimin',
            'password' => '$2y$10$1XWTywZAzNQ8.dQ1j1lamewfvByAJ5ehZTyqCVVuB7E5dp9djBDbq',
            'nama_lengkap' => 'Abdul Muhaimin',
            'avatar' => 'storage/admin/avatar/1618839139_3c00c405dac379c46d51.jpg',
            'tanggal_lahir' => '1973-05-31',
            'alamat' => 'Sekretaris PC-LPNU Kab. Malang',
            'nomor_hp' => '081555961758',
            'nomor_ktp' => '3514113105730002',
            'remember_token' => 'YW5qYXkxNjM1MjE2ODMwLTU2Mw==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'romdloni',
            'password' => '$2y$10$pqnhTLUs7SCQKwuhR0vMKOwnIhyDlJuokCmvCK1qfc9NT6XUFavuW',
            'nama_lengkap' => 'Romdloni Maulana',
            'avatar' => 'storage/admin/avatar/1633947601_3a5ed2e686174acefc20.jpg',
            'alamat' => '',
            'nomor_hp' => '081222242315',
            'nomor_ktp' => '',
            'remember_token' => 'YW5qYXkxNjMzOTQ3NDE5LTU2',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'wildanie',
            'password' => '$2y$10$oEqELRLB7YzFbU5bZZpWZ.YUoYOxNOuL5IEXPFxpQde8pCvdL7Bem',
            'nama_lengkap' => 'M. Badar Wildanie',
            'avatar' => 'storage/admin/avatar/1637058920_73ede46ab411bbc31f20.jpg',
            'tanggal_lahir' => '1999-07-28',
            'alamat' => 'Programmer / Developer Sistem Website LPNU Malang',
            'nomor_hp' => '082228111059',
            'nomor_ktp' => '3507102807990004',
            'remember_token' => 'YW5qYXkxNjM2OTc4OTE3LTY4Mg==',
            'admin_username' => '',
        ]);
        Admin::create([
            'username' => 'yusuf99',
            'password' => '$2y$10$YJJHUQmbsD66Db9f/Jmjeu.xv4DGBd1ZoyyNsJb5svJj1ku.vi61m',
            'nama_lengkap' => 'M Yusuf Azwar Anas',
            'avatar' => 'storage/admin/avatar/1619444571_e8bfc88009818b76db7d.jpg',
            'tanggal_lahir' => '1979-04-13',
            'alamat' => 'SUPERVISOR',
            'nomor_hp' => '082141411620',
            'nomor_ktp' => '3507091304790002',
            'remember_token' => 'YW5qYXkxNjI5MjYzODQwLTM0',
            'admin_username' => '',
        ]);
    }
}
