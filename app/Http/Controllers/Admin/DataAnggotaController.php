<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

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
        return view('admin.data_anggota.create', $data);
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
