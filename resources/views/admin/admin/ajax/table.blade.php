@foreach ($data as $row)
    <tr>
        <td>{{ $data->firstItem() + $loop->index }}</td>
        <td style="vertical-align: middle">
            <div class="d-flex align-items-center">
                <img class="rounded-circle mr-2" style="width: 40px; height: 40px; object-fit: cover" src="{{ asset($row->avatar) }}" alt="avatar">
                <div class="d-flex flex-column align-items-start">
                    <h4 class="mb-0" style="line-height: 8px">
                        {{ $row->nama_lengkap }}
                        @if ($row->jenis_kelamin == 'L')
                            <span class="pl-1 text-primary"><i class="fas fa-mars"></i></span>
                        @else
                            <span class="pl-1" style="color: #F94BDC"><i class="fas fa-venus"></i></span>
                        @endif
                    </h4>
                    <span class="text-muted text-sm font-italic">
                        ({{ $row->username }})
                    </span>
                </div>
            </div>
        </td>
        <td style="vertical-align: middle" class="text-left">
            <span class="border-bottom">
                {{ $row->alamat }}
            </span>
            <br/>
            <span class="font-weight-bold">
                {{ ucwords(strtolower($row->kelurahan)) }}, 
                {{ ucwords(strtolower($row->kecamatan)) }}, 
                {{ ucwords(strtolower($row->kabupaten)) }}
            </span>
        </td>
        <td style="vertical-align: middle">
            <div class="">
                <a href="#" data-id="{{ $row->id }}" data-action={{ route('admin.update', ['admin' => $row->id]) }} data-url="{{ route('admin.show', ['admin' => $row->id]) }}" class="btn mr-1 mb-1 btn-secondary rounded rounded-circle btn-sm p-1 btn-edit" data-placement='left' title='Edit'>
                    <i class="fas fa-pencil-alt" style="width: 18px"></i>
                </a>
            </div>
            <div class="">
                <a href="#" data-id="{{ $row->id }}" data-url="{{ route('admin.destroy', ['admin' => $row->id]) }}" class="btn mr-1 mb-1 btn-danger rounded rounded-circle btn-sm p-1 btn-delete" data-placement='left' title='Hapus'>
                    <i class="fas fa-trash" style="width: 18px"></i>
                </a>
            </div>
        </td>
    </tr>
@endforeach