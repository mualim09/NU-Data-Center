<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\AnggotaOrganisasiLain;
use App\Models\AnggotaOrganisasiNu;
use App\Models\AnggotaPekerjaan;
use App\Models\AnggotaPendidikan;
use App\Models\PKP;
use App\Models\Pondok;
use App\Models\Wilayah\City;
use Illuminate\Http\Request;

class EntryAnggotaController extends Controller
{
    /**
     * Menampilkan halaman entry data
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['dataCity'] = City::orderBy('city_name', 'asc')
            ->where('prov_id', 15)
            ->get();

        return view('entry_anggota.create', $data);
    }


    /**
     * Menyimpan resource yang diberikan ke penyimpanan
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pondok = Pondok::create([
            'nama' => $request->pondok_nama,
            'alamat' => $request->pondok_alamat,
        ]);

        $pendidikan = AnggotaPendidikan::create([
            'pendidikan_terakhir'=> $request->pendidikan_pendidikan_terakhir,
            'jurusan'=> $request->pendidikan_jurusan,
            'pendidikan_pesantren'=> $request->pendidikan_pendidikan_pesantren,
            'pondok_id' => $pondok->id,
        ]);

        $pekerjaan = AnggotaPekerjaan::create([
            'jenis_profesi' => $request->pekerjaan_jenis_profesi,
            'alamat_kantor' => $request->pekerjaan_alamat_kantor,
            'penghasilan_perbulan' => $request->pekerjaan_penghasilan_perbulan,
        ]);

        $pkp = PKP::create([
            'angkatan_pkp' => $request->pkp_angkatan_pkp,
            'lokasi_kegiatan' => $request->pkp_lokasi_kegiatan,
            'waktu_kegiatan' => $request->pkp_waktu_kegiatan,
        ]);


        $pathFotoDiri = 'images/img-unavailable.png';
        if ($request->hasFile('foto_diri')) {
            $pathFotoDiri = 'storage/' . $request->file('foto_diri')->store('anggota/foto_diri');
        }
        $pathScanKtp = 'images/img-unavailable.png';
        if ($request->hasFile('scan_ktp')) {
            $pathScanKtp = 'storage/' . $request->file('scan_ktp')->store('anggota/scan_ktp');
        }
        $pathScanKartanu = 'images/img-unavailable.png';
        if ($request->hasFile('scan_kartanu')) {
            $pathScanKartanu = 'storage/' . $request->file('scan_kartanu')->store('anggota/scan_kartanu');
        }

        $anggota = Anggota::create([
            'no_kartanu' => $request->no_kartanu,
            'no_ktp' => $request->no_ktp,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'foto_diri' => $pathFotoDiri,
            'scan_ktp' => $pathScanKtp,
            'scan_kartanu' => $pathScanKartanu,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'alamat' => $request->alamat,
            'status_menikah' => $request->status_menikah,
            'jumlah_anggota_keluarga' => $request->jumlah_anggota_keluarga,
            'anggota_pendidikan_id' => $pendidikan->id,
            'anggota_pekerjaan_id' => $pekerjaan->id,
            'aktifitas_nu' => $request->aktifitas_nu,
            'jabatan_nu' => $request->jabatan_nu,
            'asuransi_kesehatan' => $request->asuransi_kesehatan,
            'pkp_id' => $pkp->id
        ]);


        $organisasiNu = collect(json_decode($request->organisasi_nu));
        $organisasiNu->each(function ($organisasi) use ($anggota) {
            AnggotaOrganisasiNu::create([
                'struktur_organisasi' =>  $organisasi->struktur_organisasi,
                'jabatan' =>  $organisasi->jabatan,
                'masa_jabat_awal' =>  ($organisasi->masa_jabat_awal != '' ? $organisasi->masa_jabat_awal : null),
                'masa_jabat_akhir' =>  ($organisasi->masa_jabat_akhir != '' ? $organisasi->masa_jabat_akhir : null),
                'anggota_id' => $anggota->id,
            ]);
        });

        $organisasiLain = collect(json_decode($request->organisasi_lain));
        $organisasiLain->each(function ($organisasi) use ($anggota) {
            AnggotaOrganisasiLain::create([
                'nama_organisasi' =>  $organisasi->nama_organisasi,
                'jabatan' =>  $organisasi->jabatan,
                'masa_jabat_awal' =>  ($organisasi->masa_jabat_awal != '' ? $organisasi->masa_jabat_awal : null),
                'masa_jabat_akhir' =>  ($organisasi->masa_jabat_akhir != '' ? $organisasi->masa_jabat_akhir : null),
                'anggota_id' => $anggota->id,
            ]);
        });

        // return redirect()->route('admin.data_anggota.index')
        //     ->with('success', 'Data anggota berhasil dientry!')
        //     ->with('icon', 'fas fa-thumbs-up')
        //     ->with('color', 'success')
        //     ->with('anggota_nama', $anggota->nama);
    }

    /**
     * Menampilkan halaman detail
     *
     * @param \App\Models\Anggota $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        $data['anggota'] = $anggota;

        return view('entry_anggota.show', $data);
    }
}
