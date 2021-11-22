<?php

namespace App\Exports;

use App\Models\Anggota;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class AnggotaExport implements FromView, WithColumnFormatting
{
    public function view(): View
    {
        $data['data'] = Anggota::with(['pendidikan', 'pekerjaan'])->orderBy('nama', 'asc')->get();
        return view('admin.laporan.anggota.exports.table-excel', $data);
    }

    public function columnFormats(): array
    {
        return [
            'A' => DataType::TYPE_STRING,
            'B' => DataType::TYPE_STRING,
        ];
    }
}
