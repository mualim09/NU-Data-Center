@extends('argon.main')

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

<header class="bg-gradient-success pt-5 pb-6">
    <div class="container-fluid">
        <div class="row">
            <div class="col d-flex align-items-center" style="line-height: 12px">
                <i class="fas fa-plus-circle mr-3 text-white" style="font-size: 40px"></i>
                <div class="pb-2">
                    <h2 class="mb-0 text-uppercase text-white font-weight-bolder">Entry data anggota</h2>
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
                                <input type="text" name="nama" class="form-control" placeholder="Tuliskan nama...">
                            </div>
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
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
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
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir...">
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
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
                                <input type="text" class="form-control" name="no_ktp" placeholder="Tuliskan nomor ktp...">
                            </div>
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
                                <input type="text" class="form-control" name="no_kartanu" placeholder="Tuliskan nomor kartanu...">
                            </div>
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
                                <input type="text" class="form-control" name="no_telepon" placeholder="Tuliskan nomor telepon...">
                            </div>
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
                                <input type="text" class="form-control" name="email" placeholder="Tuliskan email...">
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 pb-1">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-map-marker-alt mr-2" style="font-size: 12px"></i>
                                Kabupaten // Kecamatan // Kelurahan
                            </label>
                            <div class="input-group input-group-merge">
                                <select name="kabupaten" class="form-control">
                                    <option value="Kabupaten Malang">Kabupaten Malang</option>
                                </select>
                                <select name="kecamatan" class="form-control">
                                    <option value="Ampelgading">Ampelgading</option>
                                    <option value="Donomulyo">Donomulyo</option>
                                    <option value="Gondanglegi">Gondanglegi</option>
                                </select>
                                <select name="kelurahan" class="form-control">
                                    <option value="Putat Lor">Putat Lor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 pb-1">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                Alamat
                            </label>
                            <div class="font-weight-bold">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-map-signs"></i>
                                        </span>
                                    </div>
                                    <textarea name="alamat" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
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
                                <input type="file" class="form-control" name="foto_diri">
                            </div>
                            <img class="img-thumbnail preview-foto_diri" src="{{ asset('images/img-unavailable.png') }}" alt="Gambar tidak tersedia">
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
                                <input type="file" class="form-control" name="scan_ktp">
                            </div>
                            <img class="img-thumbnail preview-scan_ktp" src="{{ asset('images/img-unavailable.png') }}" alt="Gambar tidak tersedia">
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
                            <img class="img-thumbnail preview-scan_kartanu" src="{{ asset('images/img-unavailable.png') }}" alt="Gambar tidak tersedia">
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
                                    <option value="Belum menikah">Belum menikah</option>
                                    <option value="Sudah menikah">Sudah menikah</option>
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
                                <input type="number" class="form-control" min="0" placeholder="Tuliskan jumlah..." name="jumlah_anggota_keluarga">
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
                                <select name="pendidikan_terakhir" class="form-control">
                                    <option value="Tidak ada">Tidak ada</option>
                                    <option value="SD/MI">SD/MI</option>
                                    <option value="SMP/MTs">SMP/MTs</option>
                                    <option value="SMA/MA">SMA/MA</option>
                                    <option value="SMK/MK">SMK/MK</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
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
                                <input type="text" class="form-control" placeholder="Tuliskan jurusan..." name="jurusan">
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
                                <input type="text" class="form-control" placeholder="Tuliskan nama pondok pesantren..." name="pondok_nama">
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
                                <input type="text" class="form-control" placeholder="Tuliskan berapa lama pendidikan PP..." name="pendidikan_pesantren">
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
                                <textarea name="pondok_alamat" class="form-control" rows="3"></textarea>
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
                                <input name="pekerjaan_jenis_profesi" class="form-control" type="text" placeholder="Tuliskan Pekerjaan..."/>
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
                                    <option value="< Rp. 1.000.000">< Rp. 1.000.000</option>
                                    <option value="> Rp. 1.000.000 dan < Rp. 5.000.000">> Rp. 1.000.000 dan < Rp. 5.000.000</option>
                                    <option value="> Rp. 5.000.000 dan < Rp. 15.000.000">> Rp. 5.000.000 dan < Rp. 15.000.000</option>
                                    <option value="> Rp. 15.000.000">> Rp. 15.000.000</option>
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
                                <textarea name="pekerjaan_alamat_kantor" class="form-control" cols="3"></textarea>
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
                                <input type="text" class="form-control" name="asuransi_kesehatan" placeholder="Abaikan jika tidak ada...">
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
                                <input type="text" class="form-control" name="aktifitas_nu" placeholder="Misalnya: PCNU, MWCNU, LPNU, PCINU, PRNU ...">
                            </div>
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
                                <input type="text" name="jabatan_nu" class="form-control" placeholder="Tuliskan jabatan pada struktur organisasi">
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 pb-1">
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-chalkboard-teacher mr-2" style="font-size: 12px"></i>
                                Angkatan PKP
                            </label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user-tie"></i>
                                    </span>
                                </div>
                                <input type="text" name="pkp_angkatan_pkp" class="form-control" placeholder="Tuliskan angkatan PKP ke ...">
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-xs mb-1 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-map-marked-alt mr-2" style="font-size: 12px"></i>
                                Lokasi PKP
                            </label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user-tie"></i>
                                    </span>
                                </div>
                                <input type="text" name="pkp_lokasi_kegiatan" class="form-control" placeholder="Tuliskan lokasi kegiatan PKP...">
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
                                <input type="date" class="form-control" name="pkp_waktu_kegiatan">
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mb-4 pb-1">
                        <div class="col-md">
                            <label class="text-xs mb-2 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-user-friends mr-2" style="font-size: 12px"></i>
                                Aktifitas NU lainnya
                            </label>
                            <button class="btn btn-primary btn-sm mb-2 btn-tambah-organisasi_nu">
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
                                    </tr>
                                </thead>
                                <tbody id="load-organisasi_nu">
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
                    <div class="row ml-2 mb-4 pb-1">
                        <div class="col-md">
                            <label class="text-xs mb-2 d-flex align-items-center" style="color: #a595c5">
                                <i class="fas fa-user-friends mr-2" style="font-size: 12px"></i>
                                Aktifitas Organisasi lainnya
                            </label>
                            <button class="btn btn-primary btn-sm mb-2 btn-tambah-organisasi_lain">
                                <i class="fas fa-plus"></i>
                                Tambah data
                            </button>
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
                                    <tbody id="load-organisasi_lain">
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
                                    <input type="text" class="form-control" name="struktur_organisasi" placeholder="Misalnya: PCNU, MWCNU, LPNU, PRNU ...">
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
                                    <input type="text" class="form-control" name="jabatan" placeholder="Tuliskan jabatan...">
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
                                    <input type="text" class="form-control" name="nama_organisasi" placeholder="Misalnya: PCNU, MWCNU, LPNU, PRNU ...">
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
                                    <input type="text" class="form-control" name="jabatan" placeholder="Tuliskan jabatan...">
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
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(".btn-tambah-organisasi_nu").click(function (e) {
                e.preventDefault()
                $("#modal-tambah-organisasi_nu").modal('show')
            })
            $(".btn-tambah-organisasi_lain").click(function (e) {
                e.preventDefault()
                $("#modal-tambah-organisasi_lain").modal('show')
            })
        });

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
    </script>
@endsection