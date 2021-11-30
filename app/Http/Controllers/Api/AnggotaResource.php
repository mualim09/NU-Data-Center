<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataAnggota = Anggota::with(['pendidikan', 'pekerjaan'])->orderBy('nama', 'asc');

        $data['filter'] = [];

        if ($request->has('jabatan_nu')) {
            $data['filter']['Jabatan NU'] = $request->jabatan_nu;
            $dataAnggota->where('jabatan_nu', $request->jabatan_nu);
        }
        if ($request->has('aktifitas_nu')) {
            $data['filter']['Aktifitas NU'] = $request->aktifitas_nu;
            $dataAnggota->where('aktifitas_nu', $request->aktifitas_nu);
        }
        if ($request->has('kecamatan')) {
            $data['filter']['Kecamatan'] = ucwords(strtolower($request->kecamatan));
            $dataAnggota->where('kecamatan', 'like', '%' . $request->kecamatan . '%');
        }
        if ($request->has('kelurahan')) {
            $data['filter']['Kelurahan'] = ucwords(strtolower($request->kelurahan));
            $dataAnggota->where('kelurahan', 'like', '%' . $request->kelurahan . '%');
        }
        if ($request->has('nama')) {
            $data['filter']['Pencarian Nama'] = $request->nama;
            $dataAnggota->where('nama', 'like', '%' . $request->nama . '%');
        }
        if ($request->has('jenis_kelamin')) {
            $data['filter']['Jenis Kelamin'] = ($request->jenis_kelamin == 'L') ? 'Laki-laki' : 'Perempuan';
            $dataAnggota->where('jenis_kelamin', $request->jenis_kelamin);
        }
        if ($request->has('no_ktp')) {
            $data['filter']['Nomor KTP'] = $request->no_ktp;
            $dataAnggota->where('no_ktp', 'like', '%' .  $request->no_ktp . '%');
        }
        if ($request->has('no_kartanu')) {
            $data['filter']['Nomor Kartanu'] = $request->no_kartanu;
            $dataAnggota->where('no_kartanu', 'like', '%' . $request->no_kartanu . '%');
        }


        $limit = 50;
        if ($request->has('limit')) {
            $limit = $request->limit;
        }

        $data['data'] = $dataAnggota->paginate($limit);
        return response()->json([
            'content' => view($request->view_content, $data)->render(),
            'pagination' => view($request->view_pagination, $data)->render(),
            'filter' => ($request->has('view_filter')) ? view($request->view_filter, $data)->render() : ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
        //
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
