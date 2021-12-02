@extends('argon.guest')

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

<header class="bg-gradient-purple pt-5 pb-7">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col d-flex justify-content-start align-items-center">
                <img src="{{ asset($anggota->foto_diri) }}" class="rounded-circle" alt="Foto {{ $anggota->nama }}" style="width: 120px; height: 120px; object-fit: cover">
                <div class="mb-2 ml-4">
                    <h1 class="text-white mb-0">{{ $anggota->nama }}</h1>
                    <span class="font-weight-bold text-uppercase text-sm" style="color: #d6b8ff">
                        {{ $anggota->jabatan_nu }} di {{ $anggota->aktifitas_nu }}
                    </span>
                </div>
            </div>
            <div class="col-auto text-center">
                <div class="bg-white p-3 text-center d-inline-block rounded">
                    {!! QrCode::size(100)->generate(route('entry.store', ['anggota' => $anggota->id])) !!}
                </div>
                <h4 class="text-white mt-2">Data Sudah dientry kedalam sistem</h4>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid mt--5">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col">
                            <div style="color: #cac3d5" class="text-xs text-uppercase font-weight-bolder">
                                Personal
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-signature mr-2" style="font-size: 12px"></i>
                                Nama Lengkap
                            </label>
                            <div class="font-weight-bold">{{ $anggota->nama }}</div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-venus-mars mr-2" style="font-size: 12px"></i>
                                Jenis Kelamin
                            </label>
                            <div class="font-weight-bold">{{ ($anggota->jenis_kelamin == 'L') ? 'Laki-laki' : 'Perempuan' }}</div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-birthday-cake mr-2" style="font-size: 12px"></i>
                                Tempat, Tanggal Lahir
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->tempat_lahir }}, {{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->locale('id_ID')->isoFormat('DD MMMM YYYY') }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-id-card mr-2" style="font-size: 12px"></i>
                                No KTP
                            </label>
                            <div class="font-weight-bold" style="font-family: consolas">{{ $anggota->no_ktp }}</div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-id-card mr-2" style="font-size: 12px"></i>
                                No KartaNU
                            </label>
                            <div class="font-weight-bold" style="font-family: consolas">{{ $anggota->no_kartanu }}</div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-phone mr-2" style="font-size: 12px"></i>
                                Nomor Telepon
                            </label>
                            <div class="font-weight-bold" style="font-family: consolas">{{ $anggota->no_telepon }}</div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-envelope mr-2" style="font-size: 12px"></i>
                                Email
                            </label>
                            <div class="font-weight-bold">{{ $anggota->email }}</div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-map-marker-alt mr-2" style="font-size: 12px"></i>
                                Kelurahan, Kecamatan, Kabupaten
                            </label>
                            <div class="font-weight-bold">
                                {{ ucwords(strtolower($anggota->kelurahan)) }},
                                {{ ucwords(strtolower($anggota->kecamatan)) }},
                                {{ ucwords(strtolower($anggota->kabupaten)) }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-map-signs mr-2" style="font-size: 12px"></i>
                                Alamat
                            </label>
                            <div class="font-weight-bold">
                                {{ ucwords(strtolower($anggota->alamat)) }},
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-user-circle mr-2" style="font-size: 12px"></i>
                                Foto Diri
                            </label>
                            <a target="_blank" href="{{ asset($anggota->foto_diri) }}">
                                <img class="img-thumbnail" src="{{ asset($anggota->foto_diri) }}" alt="">
                            </a>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-id-card mr-2" style="font-size: 12px"></i>
                                Scan KTP
                            </label>
                            <a target="_blank" href="{{ asset($anggota->scan_ktp) }}">
                                <img class="img-thumbnail" src="{{ asset($anggota->scan_ktp) }}" alt="">
                            </a>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-id-card mr-2" style="font-size: 12px"></i>
                                Scan KartaNU
                            </label>
                            <a target="_blank" href="{{ asset($anggota->scan_kartanu) }}">
                                <img class="img-thumbnail" src="{{ asset($anggota->scan_kartanu) }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-ring mr-2" style="font-size: 12px"></i>
                                Status Menikah
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->status_menikah }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-users mr-2" style="font-size: 12px"></i>
                                Jumlah anggota Keluarga
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->jumlah_anggota_keluarga }} Orang
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
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-school mr-2" style="font-size: 12px"></i>
                                Pendidikan Terakhir
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->pendidikan->pendidikan_terakhir }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-book-reader mr-2" style="font-size: 12px"></i>
                                Jurusan
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->pendidikan->jurusan }}
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-school mr-2" style="font-size: 12px"></i>
                                Pendidikan Pesantren
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->pendidikan->pondok->nama }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-map-signs mr-2" style="font-size: 12px"></i>
                                Alamat Pondok
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->pendidikan->pondok->alamat }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-quran mr-2" style="font-size: 12px"></i>
                                Lama pendidikan
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->pendidikan->pendidikan_pesantren }}
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
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-briefcase mr-2" style="font-size: 12px"></i>
                                Profesi
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->pekerjaan->jenis_profesi }}
                            </div>
                        </div>
                        
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-briefcase mr-2" style="font-size: 12px"></i>
                                Penghasilan Perbulan
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->pekerjaan->penghasilan_perbulan }}
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-book-reader mr-2" style="font-size: 12px"></i>
                                Alamat
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->pekerjaan->alamat_kantor }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-file-medical mr-2" style="font-size: 12px"></i>
                                Asuransi Kesehatan
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->asuransi_kesehatan }}
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
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-sitemap mr-2" style="font-size: 12px"></i>
                                Aktifitas NU
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->aktifitas_nu }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-user-tie mr-2" style="font-size: 12px"></i>
                                Jabatan
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->jabatan_nu }}
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-chalkboard-teacher mr-2" style="font-size: 12px"></i>
                                Angkatan PKP
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->pkp->angkatan_pkp }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-map-marked-alt mr-2" style="font-size: 12px"></i>
                                Lokasi PKP
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->pkp->lokasi_kegiatan }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-calendar-alt mr-2" style="font-size: 12px"></i>
                                Waktu Kegiatan
                            </label>
                            <div class="font-weight-bold">
                                {{ \Carbon\Carbon::parse($anggota->pkp->waktu_kegiatan)->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY') }}
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-2 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-user-friends mr-2" style="font-size: 12px"></i>
                                Aktifitas NU lainnya
                            </label>
                            <div class="font-weight-bold">
                                <table class="table table-striped table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Organisasi</th>
                                            <th>Jabatan</th>
                                            <th>Masa jabat awal</th>
                                            <th>Masa jabat akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($anggota->organisasiNu as $organisasi)
                                        <tr>
                                            <td>{{ $organisasi->struktur_organisasi }}</td>
                                            <td>{{ $organisasi->jabatan }}</td>
                                            <td>{{ $organisasi->masa_jabat_awal }}</td>
                                            <td>{{ $organisasi->masa_jabat_akhir }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-2 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-user-friends mr-2" style="font-size: 12px"></i>
                                Aktifitas Organisasi lainnya
                            </label>
                            <div class="font-weight-bold">
                                <table class="table table-striped table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Organisasi</th>
                                            <th>Jabatan</th>
                                            <th>Masa jabat awal</th>
                                            <th>Masa jabat akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($anggota->organisasiLain as $organisasi)
                                        <tr>
                                            <td>{{ $organisasi->nama_organisasi }}</td>
                                            <td>{{ $organisasi->jabatan }}</td>
                                            <td>{{ $organisasi->masa_jabat_awal }}</td>
                                            <td>{{ $organisasi->masa_jabat_akhir }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4 mt-5">
                        <div class="col">
                            <div style="color: #cac3d5" class="text-xs text-uppercase font-weight-bolder">
                                Sistem
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 border-bottom pb-3">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-database mr-2" style="font-size: 12px"></i>
                                Dibuat pada tanggal
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->created_at->locale('id_ID')->isoFormat('DD MMMM YYYY') }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-database mr-2" style="font-size: 12px"></i>
                                Terakhir diubah
                            </label>
                            <div class="font-weight-bold">
                                {{ $anggota->created_at->locale('id_ID')->isoFormat('DD MMMM YYYY') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body text-center" style="color: black; font-family: 'Poppins', sans-serif">
                        <img src="{{ asset('images/ipnu-logo.png') }}" alt="Logo IPNU" style="width: 80%">
                        <p class="mt-5">
                            Ikatan Pelajar Nahdlatul Ulama didirikan pada 24 Februari 1954 di Semarang. Tujuan IPNU adalah terbentuknya pelajar bangsa yang bertaqwa kepada Allah SWT, berilmu, berakhlak mulia dan berwawasan kebangsaan serta bertanggungjawab atas tegak dan terlaksananya syari’at Islam menurut faham ahlussunnah wal jama’ah yang berdasarkan Pancasila dan Undang-Undang Dasar 1945.
                        </p>
                        <p>
                            IPNU tersebar diseluruh Indonesia dengan jumlah anggota 5,6 Juta berbasis pelajar, mahasiswa dan santri. IPNU selalu berkomitmen untuk menjadi organisasi kepelajaran dengan prinsip belajar, berjuang dan bertaqwa (Trilogi IPNU).
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        &copy; 2021 <a href="{{ url('/') }}" class="font-weight-bold ml-1" target="_blank">PW IPNU Jawa Timur</a>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection()