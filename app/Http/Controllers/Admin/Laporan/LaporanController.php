<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Exports\AnggotaExport;
use App\Http\Controllers\Controller;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Laporan untuk data anggota lebih dari satu
     *
     * @return \Illuminate\Http\Request $request
     */
    public function index()
    {
        $data['dataKecamatan'] = Wilayah::orderBy('kecamatan', 'asc')
            ->select('kecamatan')
            ->distinct()
            ->get()
            ->map(function ($wilayah) {
                return $wilayah->kecamatan;
            });
        return view('admin.laporan.anggota.list', $data);
    }

    /**
     * Export data anggota dalam bentuk excel
     *
     * @return \Illuminate\Http\Request $request
     */
    public function export()
    {
        return Excel::download(new AnggotaExport(), 'laporan_data_anggota.xlsx');
    }
}
