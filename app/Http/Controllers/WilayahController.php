<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $json = [];
        if ($request->has('mode')) {
            $mode = $request->mode;
            if($mode == 'kelurahan') {
                if ($request->has('kecamatan')) {
                    $json['status'] = 'success';
                    $json['data'] = Wilayah::where('kecamatan', $request->kecamatan)->get();
                    $json['kecamatan'] = $request->kecamatan;
                } else {
                    $json['status'] = 'error';
                    $json['error'] = 'Masukkan parameter kecamatan.';
                    $json['context'] = 'GET data kelurahan';
                }
            }
        } else {
            $json['status'] = 'error';
            $json['error'] = 'Masukkan parameter mode (kecamatan|kelurahan)';
        }
        return response()->json($json);
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
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function show(Wilayah $wilayah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wilayah $wilayah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wilayah $wilayah)
    {
        //
    }
}
