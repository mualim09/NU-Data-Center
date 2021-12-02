@extends('argon.main')

@section('title') Edit data - {{ $anggota->nama }} - Admin PW IPNU @endsection


@section('navbar-item')
    <li class="nav-item">
        <a href="{{ route('admin.data_anggota.index') }}" class="nav-link text-sm rounded-circle" style="padding: 8px 12px">
            <i class="fas fa-arrow-circle-left"></i> 
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link text-sm">
            Data Anggota
        </a>
    </li>
@endsection



@section('content')

    <header class="bg-gradient-warning pt-5 pb-6">
        <div class="container-fluid">
            <div class="row">
                <div class="col d-flex align-items-center" style="line-height: 12px">
                    <i class="fas fa-pencil-alt mr-4 text-white" style="font-size: 40px"></i>
                    <div class="pb-2">
                        <h2 class="mb-0 text-uppercase text-white font-weight-bolder">Edit data anggota</h2>
                        <span class="font-weight-bolder text-xs text-uppercase" style="color: #cbffeb;">{{ \Carbon\Carbon::now()->format('d F Y, H:i:s') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt--4">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('admin.data_anggota.update', ['anggota' => $anggota]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-4">
                                <div class="col">
                                    <div style="color: #cac3d5" class="text-xs text-uppercase font-weight-bolder">
                                        Personal
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md-8">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Nama Lengkap
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-signature"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="nama" value="{{ old('nama', $anggota->nama) }}" class="form-control @error('nama') is-invalid @enderror" required placeholder="Tuliskan nama...">
                                    </div>
                                    @error('nama')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Jenis Kelamin
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-venus-mars"></i>
                                            </span>
                                        </div>
                                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                            <option value="L" @if(old('jenis_kelamin', $anggota->jenis_kelamin) == 'L') selected @endif>Laki-laki</option>
                                            <option value="P" @if(old('jenis_kelamin', $anggota->jenis_kelamin) == 'P') selected @endif>Perempuan</option>
                                        </select>
                                    </div>
                                    @error('jenis_kelamin')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Tempat, Tanggal Lahir
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-birthday-cake"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $anggota->tempat_lahir) }}" class="form-control @error('tempat_lahir') is-invalid @enderror" required placeholder="Tempat lahir...">
                                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $anggota->tanggal_lahir) }}" class="form-control @error('tanggal_lahir') is-invalid @enderror" required>
                                    </div>
                                    @error('tempat_lahir')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @error('tanggal_lahir')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        No KTP
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" value="{{ old('no_ktp', $anggota->no_ktp) }}" class="form-control @error('no_ktp') is-invalid @enderror" required name="no_ktp" placeholder="Tuliskan nomor ktp...">
                                    </div>
                                    @error('no_ktp')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        No KartaNU
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" value="{{ old('no_kartanu', $anggota->no_kartanu) }}" class="form-control @error('no_kartanu') is-invalid @enderror" required name="no_kartanu" placeholder="Tuliskan nomor kartanu...">
                                    </div>
                                    @error('no_kartanu')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        <i class="fas fa-phone mr-2" style="font-size: 12px"></i>
                                        Nomor Telepon
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" value="{{ old('no_telepon', $anggota->no_telepon) }}" class="form-control @error('no_telepon') is-invalid @enderror" required name="no_telepon" placeholder="Tuliskan nomor telepon...">
                                    </div>
                                    @error('no_telepon')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        <i class="fas fa-envelope mr-2" style="font-size: 12px"></i>
                                        Email
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input type="text" value="{{ old('email', $anggota->email) }}" class="form-control" name="email" placeholder="Tuliskan email...">
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-2 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        <i class="fas fa-map-marker-alt mr-2" style="font-size: 12px"></i>
                                        Kabupaten // Kecamatan // Kelurahan
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <select name="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror" required>
                                            <option value="">---</option>
                                            @foreach ($dataCity as $city)
                                                <option @if(old('kabupaten', $anggota->kabupaten) == $city->city_name) selected @endif data-id="{{ $city->city_id }}" value="{{ $city->city_name }}">{{ ucwords(strtolower($city->city_name)) }}</option>
                                            @endforeach
                                        </select>
                                        <select name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" required>
                                            <option value="">---</option>
                                        </select>
                                        <select name="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" required>
                                            <option value="">---</option>
                                        </select>
                                    </div>
                                    @error('kabupaten')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @error('kecamatan')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @error('kelurahan')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 progress-wrapper pt-0" style="visibility: hidden">
                                <div class="col">
                                    <div class="progress">
                                        <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Alamat
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-signs"></i>
                                            </span>
                                        </div>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required rows="3">{{ old('alamat', $anggota->alamat) }}</textarea>
                                    </div>
                                    @error('alamat')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Foto Diri
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-circle"></i>
                                            </span>
                                        </div>
                                        <input type="file" class="form-control @error('foto_diri') is-invalid @enderror" name="foto_diri">
                                    </div>
                                    <div class="text-uppercase mb-2 font-weight-bolder text-gray pt-1" style="font-size: 8px">
                                        Tips: Abaikan jika tidak ingin merubah file
                                    </div>
                                    @error('foto_diri')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <img class="img-thumbnail preview-foto_diri" src="{{ asset($anggota->foto_diri) }}" alt="Gambar tidak tersedia">
                                </div>
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Scan KTP
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="file" class="form-control @error('scan_ktp') is-invalid @enderror" name="scan_ktp">
                                    </div>
                                    <div class="text-uppercase mb-2 font-weight-bolder text-gray pt-1" style="font-size: 8px">
                                        Tips: Abaikan jika tidak ingin merubah file
                                    </div>
                                    @error('scan_ktp')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <img class="img-thumbnail preview-scan_ktp" src="{{ asset($anggota->scan_ktp) }}" alt="Gambar tidak tersedia">
                                </div>
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Scan KartaNU
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="file" class="form-control" name="scan_kartanu">
                                    </div>
                                    <div class="text-uppercase mb-2 font-weight-bolder text-gray pt-1" style="font-size: 8px">
                                        Tips: Abaikan jika tidak ingin merubah file
                                    </div>
                                    @error('scan_kartanu')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <img class="img-thumbnail preview-scan_kartanu" src="{{ asset($anggota->scan_kartanu) }}" alt="Gambar tidak tersedia">
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Status Menikah
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-ring"></i>
                                            </span>
                                        </div>
                                        <select name="status_menikah" class="form-control">
                                            <option @if(old('status_menikah', $anggota->status_menikah) == 'Belum menikah') selected @endif value="Belum menikah">Belum menikah</option>
                                            <option @if(old('status_menikah', $anggota->status_menikah) == 'Sudah menikah') selected @endif value="Sudah menikah">Sudah menikah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Jumlah anggota Keluarga
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-users"></i>
                                            </span>
                                        </div>
                                        <input type="number" value="{{ old('jumlah_anggota_keluarga', $anggota->jumlah_anggota_keluarga) }}" class="form-control" min="0" placeholder="Tuliskan jumlah..." name="jumlah_anggota_keluarga">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Orang</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 mt-5">
                                <div class="col">
                                    <div style="color: #cac3d5" class="text-xs text-uppercase font-weight-bolder">
                                        Pendidikan
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Pendidikan Terakhir
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                        </div>
                                        <select name="pendidikan_pendidikan_terakhir" class="form-control">
                                            <option @if(old('pendidikan_pendidikan_terakhir', $anggota->pendidikan->pendidikan_terakhir) == 'Tidak ada') selected @endif value="Tidak ada">Tidak ada</option>
                                            <option @if(old('pendidikan_pendidikan_terakhir', $anggota->pendidikan->pendidikan_terakhir) == 'SD/MI') selected @endif value="SD/MI">SD/MI</option>
                                            <option @if(old('pendidikan_pendidikan_terakhir', $anggota->pendidikan->pendidikan_terakhir) == 'SMP/MTs') selected @endif value="SMP/MTs">SMP/MTs</option>
                                            <option @if(old('pendidikan_pendidikan_terakhir', $anggota->pendidikan->pendidikan_terakhir) == 'SMA/MA') selected @endif value="SMA/MA">SMA/MA</option>
                                            <option @if(old('pendidikan_pendidikan_terakhir', $anggota->pendidikan->pendidikan_terakhir) == 'SMK/MK') selected @endif value="SMK/MK">SMK/MK</option>
                                            <option @if(old('pendidikan_pendidikan_terakhir', $anggota->pendidikan->pendidikan_terakhir) == 'D3') selected @endif value="D3">D3</option>
                                            <option @if(old('pendidikan_pendidikan_terakhir', $anggota->pendidikan->pendidikan_terakhir) == 'S1') selected @endif value="S1">S1</option>
                                            <option @if(old('pendidikan_pendidikan_terakhir', $anggota->pendidikan->pendidikan_terakhir) == 'S2') selected @endif value="S2">S2</option>
                                            <option @if(old('pendidikan_pendidikan_terakhir', $anggota->pendidikan->pendidikan_terakhir) == 'S3') selected @endif value="S3">S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Jurusan
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-book-reader"></i>
                                            </span>
                                        </div>
                                        <input value="{{ old('pendidikan_jurusan', $anggota->pendidikan->jurusan) }}" type="text" class="form-control" placeholder="Tuliskan jurusan..." name="pendidikan_jurusan">
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Pendidikan Pesantren
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-school"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Tuliskan nama pondok pesantren..." value="{{ old('pondok_nama', $anggota->pendidikan->pondok->nama) }}" name="pondok_nama">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Lama pendidikan
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-quran"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Tuliskan berapa lama pendidikan PP..." value="{{ old('pendidikan_pendidikan_pesantren', $anggota->pendidikan->pendidikan_pesantren) }}" name="pendidikan_pendidikan_pesantren">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Tahun</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Alamat Pondok
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-signs"></i>
                                            </span>
                                        </div>
                                        <textarea name="pondok_alamat" class="form-control" rows="3">{{ old('pondok_alamat', $anggota->pendidikan->pondok->alamat) }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 mt-5">
                                <div class="col">
                                    <div style="color: #cac3d5" class="text-xs text-uppercase font-weight-bolder">
                                        Pekerjaan
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Profesi
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-briefcase"></i>
                                            </span>
                                        </div>
                                        <input value="{{ old('pekerjaan_jenis_profesi', $anggota->pekerjaan->jenis_profesi) }}" name="pekerjaan_jenis_profesi" class="form-control" type="text" placeholder="Tuliskan Pekerjaan..."/>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        <i class="fas fa-briefcase mr-2" style="font-size: 12px"></i>
                                        Penghasilan Perbulan
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-signs"></i>
                                            </span>
                                        </div>
                                        <select name="pekerjaan_penghasilan_perbulan" class="form-control">
                                            <option @if(old('pekerjaan_penghasilan_perbulan', $anggota->pekerjaan->penghasilan_perbulan) == '< Rp. 1.000.000') selected @endif value="< Rp. 1.000.000">< Rp. 1.000.000</option>
                                            <option @if(old('pekerjaan_penghasilan_perbulan', $anggota->pekerjaan->penghasilan_perbulan) == '> Rp. 1.000.000 dan < Rp. 5.000.000') selected @endif value="> Rp. 1.000.000 dan < Rp. 5.000.000">> Rp. 1.000.000 dan < Rp. 5.000.000</option>
                                            <option @if(old('pekerjaan_penghasilan_perbulan', $anggota->pekerjaan->penghasilan_perbulan) == '> Rp. 5.000.000 dan < Rp. 15.000.000') selected @endif value="> Rp. 5.000.000 dan < Rp. 15.000.000">> Rp. 5.000.000 dan < Rp. 15.000.000</option>
                                            <option @if(old('pekerjaan_penghasilan_perbulan', $anggota->pekerjaan->penghasilan_perbulan) == '> Rp. 15.000.000') selected @endif value="> Rp. 15.000.000">> Rp. 15.000.000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Alamat kantor
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-signs"></i>
                                            </span>
                                        </div>
                                        <textarea name="pekerjaan_alamat_kantor" class="form-control" cols="3">{{ old('pekerjaan_alamat_kantor', $anggota->pekerjaan->alamat_kantor) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Asuransi Kesehatan
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-file-medical"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('asuransi_kesehatan', $anggota->asuransi_kesehatan) }}" name="asuransi_kesehatan" placeholder="Abaikan jika tidak ada...">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 mt-5">
                                <div class="col">
                                    <div style="color: #cac3d5" class="text-xs text-uppercase font-weight-bolder">
                                        Keorganisasian
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Aktifitas NU
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-sitemap"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control @error('aktifitas_nu') is-invalid @enderror" required value="{{ old('aktifitas_nu', $anggota->aktifitas_nu) }}" name="aktifitas_nu" placeholder="Misalnya: PCNU, MWCNU, LPNU, PCINU, PRNU ...">
                                    </div>
                                    @error('aktifitas_nu')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        Jabatan
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-tie"></i>
                                            </span>
                                        </div>
                                        <input type="text" value="{{ old('jabatan_nu', $anggota->jabatan_nu) }}" name="jabatan_nu" class="form-control @error('jabatan_nu') is-invalid @enderror" required placeholder="Tuliskan jabatan pada struktur organisasi">
                                    </div>
                                    @error('jabatan_nu')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        <i class="fas fa-chalkboard-teacher mr-2" style="font-size: 12px"></i>
                                        Angkatan Pengkaderan
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-tie"></i>
                                            </span>
                                        </div>
                                        <input type="text" value="{{ old('pkp_angkatan_pkp', $anggota->pkp->angkatan_pkp) }}" name="pkp_angkatan_pkp" class="form-control" placeholder="Tuliskan angkatan Pengkaderan ke ...">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        <i class="fas fa-map-marked-alt mr-2" style="font-size: 12px"></i>
                                        Lokasi Pengkaderan
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-tie"></i>
                                            </span>
                                        </div>
                                        <input type="text" value="{{ old('pkp_lokasi_kegiatan', $anggota->pkp->lokasi_kegiatan) }}" name="pkp_lokasi_kegiatan" class="form-control" placeholder="Tuliskan lokasi kegiatan Pengkaderan...">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                        <i class="fas fa-calendar-alt mr-2" style="font-size: 12px"></i>
                                        Waktu Kegiatan
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-tie"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" value="{{ old('pkp_waktu_kegiatan', \Carbon\Carbon::parse($anggota->pkp->waktu_kegiatan)->format('Y-m-d')) }}" name="pkp_waktu_kegiatan">
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-2 d-flex align-items-center" style="color: #a595c5">
                                        <i class="fas fa-user-friends mr-2" style="font-size: 12px"></i>
                                        Aktifitas NU lainnya
                                    </label>
                                    <input type="hidden" value="{{ old('organisasi_nu', json_encode($anggota->organisasiNu)) }}" name="organisasi_nu">
                                    <button tabindex="-1" class="btn btn-primary btn-sm mb-2 btn-tambah-organisasi_nu">
                                        <i class="fas fa-plus"></i>
                                        Tambah data
                                    </button>
                                    <table class="table table-striped table-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Organisasi</th>
                                                <th>Jabatan</th>
                                                <th>Masa jabat awal</th>
                                                <th>Masa jabat akhir</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="load-organisasi_nu">
                                            <tr>
                                                <td colspan="99" class="text-center">Tidak ada data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row ml-2 mb-4 pb-1">
                                <div class="col-md">
                                    <label class="text-xs mb-2 d-flex align-items-center" style="color: #a595c5">
                                        <i class="fas fa-user-friends mr-2" style="font-size: 12px"></i>
                                        Aktifitas Organisasi lainnya
                                    </label>
                                    <input type="hidden" value="{{ old('organisasi_lain', json_encode($anggota->organisasiLain)) }}" name="organisasi_lain">
                                    <button tabindex="-1" class="btn btn-primary btn-sm mb-2 btn-tambah-organisasi_lain">
                                        <i class="fas fa-plus"></i>
                                        Tambah data
                                    </button>
                                    <table class="table table-striped table-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Organisasi</th>
                                                <th>Jabatan</th>
                                                <th>Masa jabat awal</th>
                                                <th>Masa jabat akhir</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="load-organisasi_lain">
                                            <tr>
                                                <td colspan="99" class="text-center">Tidak ada data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-7 pb-1">
                                <div class="col-md">
                                    <button class="btn btn-primary btn-block">
                                        <i class="fas fa-pencil-alt mr-2"></i>
                                        Edit data
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()


@section('js_scripts')

    <div class="modal fade" id="modal-tambah-organisasi_nu">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <h4 class="mb-0">Data Organisasi Lain</h4>
                    <button class="close" data-dismiss='modal'>
                        <i class="fas fa-times"></i> 
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="form-control-label">Struktur Organisasi</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-sitemap"></i> 
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="struktur_organisasi" placeholder="Misalnya: PCNU, MWCNU, LPNU, PRNU ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="form-control-label">Jabatan</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-tie"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="jabatan" placeholder="Tuliskan jabatan..." required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="form-control-label">Masa jabat awal</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar"></i> 
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" name="masa_jabat_awal">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="form-control-label">Masa jabat akhir</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-tie"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" name="masa_jabat_akhir">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    Tambahkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-tambah-organisasi_lain">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <h4 class="mb-0">Data Organisasi Lain</h4>
                    <button class="close" data-dismiss='modal'>
                        <i class="fas fa-times"></i> 
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Organisasi</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-sitemap"></i> 
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="nama_organisasi" placeholder="Tuliskan nama organisasi lain ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="form-control-label">Jabatan</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-tie"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="jabatan" placeholder="Tuliskan jabatan..." required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="form-control-label">Masa jabat awal</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar"></i> 
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" name="masa_jabat_awal">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="form-control-label">Masa jabat akhir</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-tie"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" name="masa_jabat_akhir">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    Tambahkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            @if (old('organisasi_nu', json_encode($anggota->organisasiNu)) != '')
                let dataOrganisasiNu = JSON.parse(`{!! old('organisasi_nu', json_encode($anggota->organisasiNu)) !!}`)
                refreshDataOrganisasiNu()
            @else
                let dataOrganisasiNu = []
            @endif
            function refreshDataOrganisasiNu() {
                html = ''
                dataOrganisasiNu.forEach(function(organisasi, index) {
                    html += `
                        <tr>
                            <td>${organisasi.struktur_organisasi}</td>
                            <td>${organisasi.jabatan}</td>
                            <td>${(organisasi.masa_jabat_awal || '-')}</td>
                            <td>${(organisasi.masa_jabat_akhir || '-')}</td>
                            <td>
                                <button type='button' data-index='${index}' class='btn btn-danger btn-sm btn-hapus-organisasi_nu rounded-circle'>
                                    <i class='fas fa-trash'></i>
                                </button
                            </td>
                        </tr>
                    `
                })
                $("input[name='organisasi_nu']").val(JSON.stringify(dataOrganisasiNu))
                $("#load-organisasi_nu").html(html)
                $(".btn-hapus-organisasi_nu").one().click(function (e) {
                    e.preventDefault()
                    if (confirm('Anda yakin akan menghapus data organisasi nu ini?')) {
                        index = $(this).data('index')
                        dataOrganisasiNu.splice(index, 1)
                        refreshDataOrganisasiNu()
                    }
                })
            }
            $(".btn-tambah-organisasi_nu").click(function (e) {
                e.preventDefault()
                $("#modal-tambah-organisasi_nu").modal('show')
            })
            $("#modal-tambah-organisasi_nu form").submit(function (e) {
                e.preventDefault()
                form = $(this);
                struktur_organisasi = form.find("input[name='struktur_organisasi']").val()
                jabatan = form.find("input[name='jabatan']").val()
                if (struktur_organisasi != '' && jabatan != '') {
                    dataOrganisasiNu.push({
                        struktur_organisasi: form.find("input[name='struktur_organisasi']").val(),
                        jabatan: form.find("input[name='jabatan']").val(),
                        masa_jabat_awal: form.find("input[name='masa_jabat_awal']").val(),
                        masa_jabat_akhir: form.find("input[name='masa_jabat_akhir']").val()
                    })
                    refreshDataOrganisasiNu()
                    $("#modal-tambah-organisasi_nu").modal('hide')
                    $(this)[0].reset()
                } else {
                    alert('Isi struktur organisasi dan jabatan terlebih dahulu')
                }
            })

            @if (old('organisasi_lain', json_encode($anggota->organisasiLain)) != '')
                let dataOrganisasiLain = JSON.parse(`{!! old('organisasi_lain', json_encode($anggota->organisasiLain)) !!}`)
                refreshDataOrganisasiLain();
            @else
                let dataOrganisasiLain = []
            @endif
            function refreshDataOrganisasiLain() {
                html = ''
                dataOrganisasiLain.forEach(function(organisasi, index) {
                    html += `
                        <tr>
                            <td>${organisasi.nama_organisasi}</td>
                            <td>${organisasi.jabatan}</td>
                            <td>${(organisasi.masa_jabat_awal || '-')}</td>
                            <td>${(organisasi.masa_jabat_akhir || '-')}</td>
                            <td>
                                <button type='button' data-index='${index}' class='btn btn-danger btn-sm btn-hapus-organisasi_lain rounded-circle'>
                                    <i class='fas fa-trash'></i>
                                </button
                            </td>
                        </tr>
                    `
                })
                $("input[name='organisasi_lain']").val(JSON.stringify(dataOrganisasiLain))
                $("#load-organisasi_lain").html(html)
                $(".btn-hapus-organisasi_lain").one().click(function (e) {
                    e.preventDefault()
                    if (confirm('Anda yakin akan menghapus data organisasi ini?')) {
                        index = $(this).data('index')
                        dataOrganisasiLain.splice(index, 1);
                        refreshDataOrganisasiLain()
                    }
                })
            }
            $(".btn-tambah-organisasi_lain").click(function (e) {
                e.preventDefault()
                $("#modal-tambah-organisasi_lain").modal('show')
            })
            $("#modal-tambah-organisasi_lain form").submit(function (e) {
                e.preventDefault()
                form = $(this);
                nama_organisasi = form.find("input[name='nama_organisasi']").val()
                jabatan = form.find("input[name='jabatan']").val()
                if (nama_organisasi != '' && jabatan != '') {
                    dataOrganisasiLain.push({
                        nama_organisasi: form.find("input[name='nama_organisasi']").val(),
                        jabatan: form.find("input[name='jabatan']").val(),
                        masa_jabat_awal: form.find("input[name='masa_jabat_awal']").val(),
                        masa_jabat_akhir: form.find("input[name='masa_jabat_akhir']").val()
                    })
                    refreshDataOrganisasiLain()
                    $("#modal-tambah-organisasi_lain").modal('hide')
                    $(this)[0].reset()
                }
                else {
                    alert('Isi nama organisasi dan jabatan terlebih dahulu')
                }
            })

            $("input[name='foto_diri']").change(function (e) {
                e.preventDefault()
                if (this.files && this.files[0]) {
                    let reader = new FileReader()
                    reader.readAsDataURL(this.files[0])
                    reader.onload = function (e) {
                        $(".preview-foto_diri").attr('src', e.target.result)
                    }
                }
            })
            $("input[name='scan_ktp']").change(function (e) {
                e.preventDefault()
                if (this.files && this.files[0]) {
                    let reader = new FileReader()
                    reader.readAsDataURL(this.files[0])
                    reader.onload = function (e) {
                        $(".preview-scan_ktp").attr('src', e.target.result)
                    }
                }
            })
            $("input[name='scan_kartanu']").change(function (e) {
                e.preventDefault()
                if (this.files && this.files[0]) {
                    let reader = new FileReader()
                    reader.readAsDataURL(this.files[0])
                    reader.onload = function (e) {
                        $(".preview-scan_kartanu").attr('src', e.target.result)
                    }
                }
            })
            $("select[name='kabupaten']").change(function (e) {
                value = $(this).find('option:selected').data('id')
                if (value != '') {
                    getKecamatan(value)
                }
            })
            $("select[name='kecamatan']").change(function (e) {
                value = $(this).find('option:selected').data('id')
                if (value != '') {
                    getKelurahan(value)
                }
            })
            function getKecamatan(kabupaten, callback) {
                $(".progress-wrapper").css('visibility', 'visible')
                $.ajax({
                    type: "GET",
                    url: "{{ route('district.index') }}",
                    data: {
                        city_id: kabupaten,
                        view_json: true,
                        limit: 999
                    },
                    dataType: "json",
                })
                .done(function (response) {
                    $(".progress-wrapper").css('visibility', 'hidden')
                    if (response.status) {
                        $("select[name='kelurahan']").html(`<option value=''>---</option>`)
                        $("select[name='kecamatan']").html(`<option value=''>---</option>`)
                        response.data.data.forEach(function (district) {
                            option = document.createElement('option')
                            option.value = district.dis_name
                            option.setAttribute('data-id', district.dis_id)
                            option.innerHTML = district.dis_name.toLowerCase().replace(/\b[a-z]/g, letter => letter.toUpperCase())
                            $("select[name='kecamatan']").append(option)
                        })
                        callback = callback || 0;
                        if (callback) callback()
                    } 
                })
            }
            function getKelurahan(kecamatan, callback) {
                $(".progress-wrapper").css('visibility', 'visible')
                $.ajax({
                    type: "GET",
                    url: "{{ route('subdistrict.index') }}",
                    data: {
                        dis_id: kecamatan,
                        view_json: true,
                        limit: 999
                    },
                    dataType: "json",
                })
                .done(function (response) {
                    if (response.status == 'success') {
                        $(".progress-wrapper").css('visibility', 'hidden')
                        $("select[name='kelurahan']").html(`<option value=''>---</option>`)
                        response.data.data.forEach(function (subdistrict) {
                            option = document.createElement('option')
                            option.value = subdistrict.subdis_name
                            option.setAttribute('data-id', subdistrict.subdis_id)
                            option.innerHTML = subdistrict.subdis_name.toLowerCase().replace(/\b[a-z]/g, letter => letter.toUpperCase())
                            $("select[name='kelurahan']").append(option)
                        })
                        callback = callback || 0;
                        if (callback) callback()
                    }
                })
            }

            @if (old('kecamatan', $anggota->kecamatan) != '')
                getKecamatan(`{{ App\Models\Wilayah\City::where('city_name', 'LIKE', old('kabupaten', $anggota->kabupaten))->first()->city_id }}`, function () {
                    $("option[value='{{ old('kecamatan', $anggota->kecamatan) }}']").attr('selected', 'selected')
                    @if (old('kecamatan', $anggota->kecamatan) != '')
                        getKelurahan(`{{ App\Models\Wilayah\District::where('dis_name', 'LIKE', old('kecamatan', $anggota->kecamatan))->first()->dis_id }}`, function () {
                            $("option[value='{{ old('kelurahan', $anggota->kelurahan) }}']").attr('selected', 'selected')
                        })
                    @endif
                })
            @endif


        });
    </script>
@endsection