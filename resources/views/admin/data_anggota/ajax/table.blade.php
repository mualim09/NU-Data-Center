@php
    $no = 1;
@endphp
@foreach ($data as $row)
    <tr>
        <td style="vertical-align: middle">{{ $no++ }}</td>
        <td style="vertical-align: middle">
            <div class="d-flex align-items-center justify-content-start">
                <img style="width: 40px; height: 40px; object-fit: cover" src="{{ asset($row->foto_diri) }}"/>
                <h4 class="mb-0 ml-2 mr-2">{{ $row->nama }}</h4>
                @if ($row->jenis_kelamin == 'L')
                    <i class="fas fa-mars text-primary"></i>
                @else
                    <i class="fas fa-venus" style="color: #f94bdc"></i>
                @endif
            </div>
        </td>
        <td style="vertical-align: middle">
            {{ $row->tempat_lahir }}, {{ \Carbon\Carbon::parse($row->tanggal_lahir)->locale('id_ID')->isoFormat('DD MMMM YYYY') }}
            <br/>
            {{ ucwords(strtolower($row->kelurahan)) }}, {{ ucwords(strtolower($row->kecamatan)) }}, {{ ucwords(strtolower($row->kabupaten)) }}
        </td>
        <td style="vertical-align: middle">{{ $row->jabatan_nu }} di {{ $row->aktifitas_nu }}</td>
        <td>
            <div class="d-flex flex-row align-items-center">
                <a href="{{ route('admin.data_anggota.show', ['anggota' => $row->id]) }}" class="btn mr-1 mb-1 btn-secondary rounded rounded-circle btn-sm p-1" data-placement='left' title='Lihat detail'>
                    <i class="fas fa-eye" style="width: 18px"></i>
                </a>
                <a href="#" class="btn mr-1 mb-1 btn-secondary rounded rounded-circle btn-sm p-1" data-placement='left' title='Edit'>
                    <i class="fas fa-pencil-alt" style="width: 18px"></i>
                </a>
                <a href="#" class="btn mr-1 mb-1 btn-danger rounded rounded-circle btn-sm p-1" data-placement='left' title='Hapus'>
                    <i class="fas fa-trash" style="width: 18px"></i>
                </a>
            </div>
        </td>
    </tr>
@endforeach