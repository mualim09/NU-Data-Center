@foreach ($data as $row)
    <tr>
        <td style="vertical-align: middle">{{ $data->firstItem() + $loop->index }}</td>
        <td style="vertical-align: middle">
            <div class="d-flex align-items-center justify-content-start">
                <img class="rounded rounded-circle" style="width: 40px; height: 40px; object-fit: cover" src="{{ asset($row->foto_diri) }}"/>
                <h4 class="mb-0 ml-2 mr-2">{{ $row->nama }}</h4>
                @if ($row->jenis_kelamin == 'L')
                    <i class="fas fa-mars text-primary"></i>
                @else
                    <i class="fas fa-venus" style="color: #f94bdc"></i>
                @endif
            </div>
        </td>
        <td>
            {{ ucwords(strtolower($row->tempat_lahir)) }}
            <br/>
            {{ \Carbon\Carbon::parse($row->tanggal_lahir)->locale('id_ID')->ISOformat('DD MMMM YYYY') }}
        </td>
        <td>
            <div class="border-bottom">
                {{ $row->alamat }}
            </div>
            <span>
                {{ ucwords(strtolower($row->kelurahan)) }},
                {{ ucwords(strtolower($row->kecamatan)) }},
                {{ ucwords(strtolower($row->kabupaten)) }},
            </span>
        </td>
        <td>{{ $row->jabatan_nu }} di {{ $row->aktifitas_nu }}</td>
        <td>{{ $row->no_ktp }}</td>
        <td>{{ $row->no_kartanu }}</td>
    </tr>
@endforeach