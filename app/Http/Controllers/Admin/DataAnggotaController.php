<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Models\Anggota;
use App\Models\AnggotaOrganisasiLain;
use App\Models\AnggotaOrganisasiNu;
use App\Models\AnggotaPekerjaan;
use App\Models\AnggotaPendidikan;
use App\Models\PKP;
use App\Models\Pondok;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dataJabatan'] = Anggota::select('jabatan_nu')->distinct()->get();
        $data['dataAktifitas'] = Anggota::select('aktifitas_nu')->distinct()->get();
        return view('admin.data_anggota.list', $data);
    }

    /**
     * Display a listing of the resource via API
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $dataAnggota = Anggota::orderBy('nama', 'asc');

        if ($request->has('nama')) {
            $dataAnggota->where('nama', 'like', '%' . $request->nama . '%');
        }
        if ($request->has('jabatan_nu')) {
            $dataAnggota->where('jabatan_nu', $request->jabatan_nu);
        }
        if ($request->has('aktifitas_nu')) {
            $dataAnggota->where('aktifitas_nu', $request->aktifitas_nu);
        }
        $limit = 50;
        if ($request->has('limit')) {
            $limit = $request->limit;
        }

        $data['data'] = $dataAnggota->paginate($limit);
        return response()->json([
            'content' => view('admin.data_anggota.ajax.table', $data)->render(),
            'pagination' => view('admin.data_anggota.ajax.pagination', $data)->render()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['anggota'] = Anggota::find(1);
        $data['dataKecamatan'] = Wilayah::orderBy('kecamatan', 'asc')
            ->select('kecamatan')
            ->distinct()
            ->get()
            ->map(function ($item) {
                return $item->kecamatan;
            });
        return view('admin.data_anggota.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnggotaRequest $request)
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

        return redirect()->route('admin.data_anggota.index')
            ->with('success', 'Data anggota berhasil dientry!')
            ->with('icon', 'fas fa-thumbs-up')
            ->with('color', 'success')
            ->with('anggota_nama', $anggota->nama);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        $data['anggota'] = $anggota;
        return view('admin.data_anggota.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        $data['dataKecamatan'] = Wilayah::orderBy('kecamatan', 'asc')
            ->select('kecamatan')
            ->distinct()
            ->get()
            ->map(function ($item) {
                return $item->kecamatan;
            });
        $data['anggota'] = $anggota;
        return view('admin.data_anggota.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnggotaRequest $request, Anggota $anggota)
    {
        $pondok = Pondok::where('id', $anggota->pendidikan->pondok_id)->update([
            'nama' => $request->pondok_nama,
            'alamat' => $request->pondok_alamat,
        ]);

        $pendidikan = AnggotaPendidikan::where('id', $anggota->anggota_pendidikan_id)->update([
            'pendidikan_terakhir'=> $request->pendidikan_pendidikan_terakhir,
            'jurusan'=> $request->pendidikan_jurusan,
            'pendidikan_pesantren'=> $request->pendidikan_pendidikan_pesantren,
        ]);

        $pekerjaan = AnggotaPekerjaan::where('id', $anggota->anggota_pekerjaan_id)->update([
            'jenis_profesi' => $request->pekerjaan_jenis_profesi,
            'alamat_kantor' => $request->pekerjaan_alamat_kantor,
            'penghasilan_perbulan' => $request->pekerjaan_penghasilan_perbulan,
        ]);

        $pkp = PKP::where('id', $anggota->pkp_id)->update([
            'angkatan_pkp' => $request->pkp_angkatan_pkp,
            'lokasi_kegiatan' => $request->pkp_lokasi_kegiatan,
            'waktu_kegiatan' => $request->pkp_waktu_kegiatan,
        ]);

        $validatedData = [
            'no_kartanu' => $request->no_kartanu,
            'no_ktp' => $request->no_ktp,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'alamat' => $request->alamat,
            'status_menikah' => $request->status_menikah,
            'jumlah_anggota_keluarga' => $request->jumlah_anggota_keluarga,
            'aktifitas_nu' => $request->aktifitas_nu,
            'jabatan_nu' => $request->jabatan_nu,
            'asuransi_kesehatan' => $request->asuransi_kesehatan,
        ];

        if ($request->hasFile('foto_diri')) {
            if (file_exists(public_path() . '/' . $anggota->foto_diri)) {
                Storage::delete('anggota/foto_diri/' . basename($anggota->foto_diri));
            }
            $pathFotoDiri = 'storage/' . $request->file('foto_diri')->store('anggota/foto_diri');
            $validatedData['foto_diri'] = $pathFotoDiri;
        }
        if ($request->hasFile('scan_ktp')) {
            if (file_exists(public_path() . '/' . $anggota->scan_ktp)) {
                Storage::delete('anggota/scan_ktp/' . basename($anggota->scan_ktp));
            }
            $pathScanKtp = 'storage/' . $request->file('scan_ktp')->store('anggota/scan_ktp');
            $validatedData['scan_ktp'] = $pathScanKtp;
        }
        if ($request->hasFile('scan_kartanu')) {
            if (file_exists(public_path() . '/' . $anggota->scan_kartanu)) {
                Storage::delete('anggota/scan_kartanu/' . basename($anggota->scan_kartanu));
            }
            $pathScanKartanu = 'storage/' . $request->file('scan_kartanu')->store('anggota/scan_kartanu');
            $validatedData['scan_kartanu'] = $pathScanKartanu;
        }
        $anggota->update($validatedData);

        AnggotaOrganisasiNu::where('anggota_id', $anggota->id)->delete();

        $organisasiNu = collect(json_decode($request->organisasi_nu));
        // dd($organisasiNu);
        $organisasiNu->each(function ($organisasi) use ($anggota) {
            if (isset($organisasi)) {
                AnggotaOrganisasiNu::create([
                    'struktur_organisasi' =>  $organisasi->struktur_organisasi,
                    'jabatan' =>  $organisasi->jabatan,
                    'masa_jabat_awal' =>  ($organisasi->masa_jabat_awal != '' ? $organisasi->masa_jabat_awal : null),
                    'masa_jabat_akhir' =>  ($organisasi->masa_jabat_akhir != '' ? $organisasi->masa_jabat_akhir : null),
                    'anggota_id' => $anggota->id,
                ]);
            }
        });

        AnggotaOrganisasiLain::where('anggota_id', $anggota->id)->delete();

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

        return redirect()->route('admin.data_anggota.index')
            ->with('success', 'Data anggota berhasil diupdate!')
            ->with('icon', 'fas fa-thumbs-up')
            ->with('color', 'success')
            ->with('anggota_nama', $anggota->nama);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        //
    }
}
