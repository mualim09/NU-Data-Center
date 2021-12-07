@extends('argon.main')

@section('title') 
    List data anggota - Admin PW IPNU 
@endsection

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection

@section('navbar-item')
    <li class="nav-item">
        <a href="#" class="nav-link text-sm">
            Data Anggota
        </a>
    </li>
@endsection


@section('content')


<div class="alert alert-default alert-dismissible justify-content-between col-md-3 col-11 py-3 pl-3 pr-0 align-items-center" role="alert" style="position: fixed;right: 16px;top: 16px;z-index: 1050;display: none;">
	<div class="text-left d-flex align-items-center">
	    <div class="alert-icon"><i class="fas fa-thumbs-up"></i></div>
	    <div class="alert-text mr-3"></div>
	</div>
    <a href="javascript:void(0)" data-dismiss="alert" class="btn btn-link text-white">
    	<i class="fas fa-times"></i> 
    </a>
</div>


<header class="bg-blue py-6"></header>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header py-2 px-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-auto text-center">
                            <i class="fas fa-user-cog mb-2" style="font-size: 32px"></i>
                            <h3 class="card-title mb-0">
                                Administrator
                            </h3>
                        </div>
                        <div class="col-md">
                            <div class="row align-items-center">
                                <div class="col-md pl-md-1 pr-md-1">
                                    <div class="form-group mb-0">
                                        <label>Pencarian</label>
                                        <div class="input-group input-group-sm input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm filter-pencarian" placeholder="Cari nama disini...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-auto pl-md-1">
                                    <div class="form-group mb-0">
                                        <label>Cari Berdasarkan</label><br/>
                                        <div class="custom-control custom-control-inline custom-radio">
                                            <input type="radio" class="custom-control-input filter-berdasarkan" name="cari_berdasarkan" value="nama_lengkap" id="cari-nama_lengkap" checked>
                                            <label for="cari-nama_lengkap" class="custom-control-label text-capitalize font-weight-normal" style="font-size: 10px; line-height: 24px;">Nama lengkap</label>
                                        </div>
                                        <div class="custom-control custom-control-inline custom-radio">
                                            <input type="radio" class="custom-control-input filter-berdasarkan" name="cari_berdasarkan" value="username" id="cari-username">
                                            <label for="cari-username" class="custom-control-label text-capitalize font-weight-normal" style="font-size: 10px; line-height: 24px;">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 pl-md-1 pr-md-1">
                                    <div class="form-group mb-0">
                                        <label for="limit">Limit baris</label>
                                        <div class="input-group input-group-merge input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-list"></i>
                                                </span>
                                            </div>
                                            <input type="number" value="50" min="0" max="500" step="5" class="form-control form-control-sm filter-limit">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-group mb-0 text-center text-md-left mt-2 mt-md-0">
                                        <a href="#" class="btn btn-success rounded-circle btn-sm btn-create-admin" data-toggle='tooltip' title="Tambah administrator" data-placement="left">
                                            <i class="fas fa-plus-circle"></i>
                                        </a>
                                        <span class="d-inline-block d-md-none text-uppercase font-weight-bolder text-xs">Tambah data Anggota</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md pl-md-1 pr-md-1">
                                    <div class="form-group mb-0">
                                        <label>Kabupaten</label>
                                        <div class="input-group input-group-sm input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map-marked-alt"></i>
                                                </span>
                                            </div>
                                            <select class="form-control filter-kabupaten">
                                                <option value="">- Pilih Kabupaten/Kota -</option>
                                                @foreach ($dataCity as $kabupaten)
                                                    <option value="{{ $kabupaten->city_name }}" data-id="{{ $kabupaten->city_id }}">{{ ucwords(strtolower($kabupaten->city_name)) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md pl-md-1 pr-md-1">
                                    <div class="form-group mb-0">
                                        <label>Kecamatan</label>
                                        <div class="input-group input-group-sm input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map-marked-alt icon-kelurahan"></i>
                                                </span>
                                            </div>
                                            <select class="form-control filter-kecamatan" disabled>
                                                <option value="">- Pilih Kecamatan -</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md pl-md-1 pr-md-1">
                                    <div class="form-group mb-0">
                                        <label>Kelurahan</label>
                                        <div class="input-group input-group-sm input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map-marked-alt icon-kelurahan"></i>
                                                </span>
                                            </div>
                                            <select class="form-control filter-kelurahan" disabled>
                                                <option value="">- Pilih Kelurahan -</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress mb-0" style="visibility: hidden">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered table-condensed">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 60px">No</th>
                                <th style="width: 40%">Nama</th>
                                <th style="width: 50%">Tempat Lahir & Asal</th>
                                <th style="width: 60px"></th>
                            </tr>
                        </thead>
                        <tbody id="load-data">
                        </tbody>
                    </table>
                </div>
                <div class="card-footer load-pagination d-flex justify-content-end align-items-center">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()


@section('js_scripts')

<div class="modal fade" id="modal-create-admin">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-gradient-default">
                <h4 class="mb-0 text-white">Tambah akun administrator</h4>
                <button class="close text-white text-xs" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-2">
                                        <label for="create-admin-nama_lengkap" class="text-xs mb-1 text-default font-weight-bold">Nama Lengkap</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nama_lengkap" id="create-admin-nama_lengkap" placeholder="Tuliskan nama lengkap..." required>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-nama_lengkap" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label for="create-admin-jenis_kelamin" class="text-xs mb-1 text-default font-weight-bold">Jenis Kelamin</label>
                                        <br/>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="create-admin-jenis_kelamin-L" name="jenis_kelamin" value="L" class="custom-control-input" checked>
                                            <label for="create-admin-jenis_kelamin-L" class="custom-control-label font-weight-bold text-default">
                                                <i class="fas fa-mars mr-1" style="width: 8px"></i>
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="create-admin-jenis_kelamin-P" name="jenis_kelamin" value="P" class="custom-control-input">
                                            <label for="create-admin-jenis_kelamin-P" class="custom-control-label font-weight-bold" style="color: #F94BDC">
                                                <i class="fas fa-venus mr-1" style="width: 8px"></i>
                                                Perempuan
                                            </label>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-jenis_kelamin" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group mb-2">
                                        <label for="create-admin-username" class="text-xs mb-1 text-default font-weight-bold">Username</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="username" id="create-admin-username" placeholder="Tuliskan username..." required>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-username" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-md-1">
                                    <div class="form-group mb-2">
                                        <label for="create-admin-tempat_lahir" class="text-xs mb-1 text-default font-weight-bold">Tempat, Tanggal Lahir</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" name="tempat_lahir" id="create-admin-tempat_lahir" placeholder="Tempat lahir..." required>
                                            <input type="date" class="form-control" name="tanggal_lahir" required>
                                        </div>
                                    </div>
                                    <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-tempat_lahir" style="font-size: 8px; display: none">
                                    </div>
                                    <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-tanggal_lahir" style="font-size: 8px; display: none">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group mb-2">
                                        <label for="create-admin-password" class="text-xs mb-1 text-default font-weight-bold">Password</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" class="form-control" name="password" id="create-admin-password" placeholder="Password..." required>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-password" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-md-1">
                                    <div class="form-group mb-2">
                                        <label for="create-admin-password_confirm" class="text-xs mb-1 text-default font-weight-bold">Konfirmasi Password</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" class="form-control" name="password_confirmation" id="create-admin-password_confirm" placeholder="Tuliskan Password lagi..." required>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-password_confirmation" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group mb-2">
                                        <label for="create-admin-nomor_hp" class="text-xs mb-1 text-default font-weight-bold">Nomor HP</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nomor_hp" id="create-admin-nomor_hp" placeholder="Nomor HP..." required>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-nomor_hp" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-md-1">
                                    <div class="form-group mb-2">
                                        <label for="create-admin-nomor_ktp" class="text-xs mb-1 text-default font-weight-bold">Nomor KTP</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nomor_ktp" id="create-admin-nomor_ktp" placeholder="Nomor KTP..." required>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-nomor_ktp" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md pr-md-1">
                                    <div class="form-group mb-2">
                                        <label for="create-admin-kabupaten" class="text-xs mb-1 text-default font-weight-bold">Kabupaten/kota</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt icon-kabupaten"></i></span>
                                            </div>
                                            <select name="kabupaten" class="form-control" id="create-admin-kabupaten" required>
                                                <option value="">- Pilih kabupaten -</option>
                                                @foreach ($dataCity as $city)
                                                    <option value="{{ $city->city_name }}" data-id="{{ $city->city_id }}">{{ ucwords(strtolower($city->city_name)) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-kabupaten" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md pl-md-1">
                                    <div class="form-group mb-2">
                                        <label for="create-admin-kecamatan" class="text-xs mb-1 text-default font-weight-bold">Kecamatan</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt icon-kecamatan"></i></span>
                                            </div>
                                            <select name="kecamatan" class="form-control" id="create-admin-kecamatan" disabled required>
                                                <option value="">- Pilih kecamatan -</option>
                                            </select>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-kecamatan" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md pl-md-1">
                                    <div class="form-group mb-2">
                                        <label for="create-admin-kelurahan" class="text-xs mb-1 text-default font-weight-bold">Kelurahan</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt icon-kelurahan"></i></span>
                                            </div>
                                            <select name="kelurahan" class="form-control" id="create-admin-kelurahan" disabled required>
                                                <option value="">- Pilih kelurahan -</option>
                                            </select>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-kelurahan" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-2">
                                        <label for="create-admin-alamat" class="text-xs font-weight-bold text-default mb-1">Alamat</label>
                                        <textarea name="alamat" id="create-admin-alamat" class="form-control" name="alamat"></textarea>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-alamat" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col text-center mb-2">
                                    <img class="img-thumbnail w-100 preview-avatar" src="{{ asset('images/img-unavailable.png') }}" alt="preview">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="create-admin-avatar" class="text-xs mb-1 text-dark font-weight-bold" for="create-admin-avatar">Upload Avatar</label>
                                        <input type="file" id="create-admin-avatar" name="avatar" class="form-control form-control-sm" style="padding-top: 1px">
                                    </div>
                                    <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-avatar" style="font-size: 8px; display: none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button type="submit" class="btn btn-default btn-block">
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

<div class="modal fade" id="modal-edit-admin">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-gradient-default">
                <h4 class="mb-0 text-white">Edit akun administrator</h4>
                <button class="close text-white text-xs" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-absolute rounded justify-content-center align-items-center top-0 bottom-0 left-0 right-0" style="display: flex; z-index: 1; background: rgba(0, 0, 0, 0.7);">
                    <div class="text-center text-white">
                        <i class="fas fa-spin fa-sync-alt mb-3" style="font-size: 40px"></i>
                        <h4 class="text-white" style="font-size: 16px; text-transform: uppercase">Loading...</h4>
                    </div>
                </div>
                <form>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-2">
                                        <label for="edit-admin-nama_lengkap" class="text-xs mb-1 text-default font-weight-bold">Nama Lengkap</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                            </div>
                                            <input type="hidden" name="id">
                                            <input type="hidden" name="url">
                                            <input type="hidden" name="action">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="form-control" name="nama_lengkap" id="edit-admin-nama_lengkap" placeholder="Tuliskan nama lengkap..." required>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-nama_lengkap" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label for="edit-admin-jenis_kelamin" class="text-xs mb-1 text-default font-weight-bold">Jenis Kelamin</label>
                                        <br/>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="edit-admin-jenis_kelamin-L" name="jenis_kelamin" value="L" class="custom-control-input" checked>
                                            <label for="edit-admin-jenis_kelamin-L" class="custom-control-label font-weight-bold text-default">
                                                <i class="fas fa-mars mr-1" style="width: 8px"></i>
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="edit-admin-jenis_kelamin-P" name="jenis_kelamin" value="P" class="custom-control-input">
                                            <label for="edit-admin-jenis_kelamin-P" class="custom-control-label font-weight-bold" style="color: #F94BDC">
                                                <i class="fas fa-venus mr-1" style="width: 8px"></i>
                                                Perempuan
                                            </label>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-jenis_kelamin" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group mb-2">
                                        <label for="edit-admin-username" class="text-xs mb-1 text-default font-weight-bold">Username</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="username" id="edit-admin-username" placeholder="Tuliskan username..." required>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-username" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-md-1">
                                    <div class="form-group mb-2">
                                        <label for="edit-admin-tempat_lahir" class="text-xs mb-1 text-default font-weight-bold">Tempat, Tanggal Lahir</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" name="tempat_lahir" id="edit-admin-tempat_lahir" placeholder="Tempat lahir..." required>
                                            <input type="date" class="form-control" name="tanggal_lahir" required>
                                        </div>
                                    </div>
                                    <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-tempat_lahir" style="font-size: 8px; display: none">
                                    </div>
                                    <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-tanggal_lahir" style="font-size: 8px; display: none">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group mb-2">
                                        <label for="edit-admin-password" class="text-xs mb-1 text-default font-weight-bold">Password</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" class="form-control" name="password" id="edit-admin-password" placeholder="Password...">
                                        </div>
                                        <div class="font-weight-bolder text-muted pl-1 pt-1 error-message error-password" style="font-size: 9px">
                                            Abaikan jika tidak ingin merubah password
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-password" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-md-1">
                                    <div class="form-group mb-2">
                                        <label for="edit-admin-password_confirm" class="text-xs mb-1 text-default font-weight-bold">Konfirmasi Password</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" class="form-control" name="password_confirmation" id="edit-admin-password_confirm" placeholder="Tuliskan Password lagi...">
                                        </div>
                                        <div class="font-weight-bolder text-muted pl-1 pt-1 error-message error-password" style="font-size: 8px">
                                            Abaikan jika tidak ingin merubah password
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-password_confirmation" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group mb-2">
                                        <label for="edit-admin-nomor_hp" class="text-xs mb-1 text-default font-weight-bold">Nomor HP</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nomor_hp" id="edit-admin-nomor_hp" placeholder="Nomor HP..." required>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-nomor_hp" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-md-1">
                                    <div class="form-group mb-2">
                                        <label for="edit-admin-nomor_ktp" class="text-xs mb-1 text-default font-weight-bold">Nomor KTP</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nomor_ktp" id="edit-admin-nomor_ktp" placeholder="Nomor KTP..." required>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-nomor_ktp" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md pr-md-1">
                                    <div class="form-group mb-2">
                                        <label for="edit-admin-kabupaten" class="text-xs mb-1 text-default font-weight-bold">Kabupaten/kota</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt icon-kabupaten"></i></span>
                                            </div>
                                            <select name="kabupaten" class="form-control" id="edit-admin-kabupaten" required>
                                                <option value="">- Pilih kabupaten -</option>
                                                @foreach ($dataCity as $city)
                                                    <option value="{{ $city->city_name }}" data-id="{{ $city->city_id }}">{{ ucwords(strtolower($city->city_name)) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-kabupaten" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md pl-md-1">
                                    <div class="form-group mb-2">
                                        <label for="edit-admin-kecamatan" class="text-xs mb-1 text-default font-weight-bold">Kecamatan</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt icon-kecamatan"></i></span>
                                            </div>
                                            <select name="kecamatan" class="form-control" id="edit-admin-kecamatan" disabled required>
                                                <option value="">- Pilih kecamatan -</option>
                                            </select>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-kecamatan" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md pl-md-1">
                                    <div class="form-group mb-2">
                                        <label for="edit-admin-kelurahan" class="text-xs mb-1 text-default font-weight-bold">Kelurahan</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt icon-kelurahan"></i></span>
                                            </div>
                                            <select name="kelurahan" class="form-control" id="edit-admin-kelurahan" disabled required>
                                                <option value="">- Pilih kelurahan -</option>
                                            </select>
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-kelurahan" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-2">
                                        <label for="edit-admin-alamat" class="text-xs font-weight-bold text-default mb-1">Alamat</label>
                                        <textarea name="alamat" id="edit-admin-alamat" class="form-control"></textarea>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-alamat" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col text-center mb-2">
                                    <img class="img-thumbnail w-100 preview-avatar" src="{{ asset('images/img-unavailable.png') }}" alt="preview">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="edit-admin-avatar" class="text-xs mb-1 text-dark font-weight-bold" for="edit-admin-avatar">Upload Avatar</label>
                                        <input type="file" id="edit-admin-avatar" name="avatar" class="form-control form-control-sm" style="padding-top: 1px">
                                        <div class="font-weight-bolder text-muted pl-1 pt-1 error-message error-password" style="font-size: 8px">
                                            Abaikan jika tidak ingin merubah gambar
                                        </div>
                                        <div class="text-uppercase font-weight-bolder text-danger pl-1 pt-1 error-message error-avatar" style="font-size: 8px; display: none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button type="submit" class="btn btn-default btn-block">
                                <i class="fas fa-pencil-alt mr-2"></i>
                                Edit
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

        function showAlert(text, icon, color) {
			$(".alert").addClass('d-flex')
			$(".alert-icon i").attr('class', '')
			$(".alert-icon i").addClass(icon)
			$(".alert-text").html(text)

			classArray = ['alert-danger', 'alert-success', 'alert-info', 'alert-dark', 'alert-light', 'alert-warning', 'alert-primary', 'alert-secondary', 'alert-default']
			$.each(classArray, function(index, value) {
				$(".alert").removeClass(value)
			})
			$(".alert").addClass('alert-' + color)


			$(".alert").css({opacity: '0.0'}).animate({opacity: '1.0'}, 500)
			setTimeout(function() {
				$(".alert").animate({opacity: '0.0'}, 500, 'linear', function() {
					$(this).removeClass('d-flex')
					$(this).css('display', 'none')
				})
			}, 5000)
		}
        @if (session()->has('success'))
            showAlert(`{{ session('success') }}`, `{{ session('icon') }}`, `{{ session('color') }}`)
        @endif


        const dataParams = {
            view_content: 'admin.admin.ajax.table',
            view_pagination: 'admin.admin.ajax.pagination',
            berdasarkan: 'nama_lengkap',
            limit: 50
        }
        function refreshData(link) {
            if (link === undefined) link = "{{ route('admin.index') }}"
            $(".progress").css('visibility', 'visible')
            $.ajax({
                type: "GET",
                url: link,
                dataType: "json",
                data: dataParams
            })
            .done(function (data) {
                $("#load-data").html(data.content)
                $(".load-pagination").html(data.pagination)
                onLoadData();
            })
            .always(function () {
                $(".progress").css('visibility', 'hidden')
                $("[data-toggle='tooltip']").one().tooltip()
            })
        }
        refreshData()
        function onLoadData() {
            $(".pagination a").click(function (e) {
                e.preventDefault();
                link = $(this).attr('href')
                refreshData(link)
            })

            $(".btn-edit").click(function (e) {
                e.preventDefault()
                id = $(this).data('id')
                url = $(this).data('url')
                action = $(this).data('action')
                modalEditAdmin.find("[name='id']").val(id)
                modalEditAdmin.find("[name='url']").val(url)
                modalEditAdmin.find("[name='action']").val(action)
                modalEditAdmin.find('.modal-body > div').css('display', 'flex')
                modalEditAdmin.modal('show')
            })

            $(".btn-delete").click(function (e) {
                e.preventDefault()
                if (confirm('Data yang dihapus tidak dapat dikembalikan lagi. Anda yakin?')) {
                    url = $(this).data('url')
                    $.ajax({
                        type: "POST",
                        url: url,
                        beforeSend: function(request) {
                            request.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'))
                        },
                        data: {
                            _method: 'DELETE' 
                        },
                        dataType: "json",
                    })
                    .done(function (response) {
                        refreshData()
                    })
                    .always(function () {
                    })
                }
            })
        }

        $(".filter-pencarian").on('input', function (e) {
            value = $(this).val()
            if (value != '')
                dataParams.pencarian = value
            else
                delete dataParams.pencarian
            refreshData()
        })
        $(".filter-berdasarkan").change(function (e) {
            value = $(this).val()
            if (value != '') {
                dataParams.berdasarkan = value
                if (value == 'nama_lengkap')
                    $(".filter-pencarian").attr('placeholder', 'Cari nama disini...');
                else
                    $(".filter-pencarian").attr('placeholder', 'Tuliskan username disini...');
            }
            else {
                delete dataParams.berdasarkan
            }
            refreshData()
        })
        $(".filter-limit").change(function (e) {
            value = $(this).val()
            if (value != '')
                dataParams.limit = value
            else
                delete dataParams.limit
            refreshData()
        })
        $(".filter-kabupaten").change(function (e) {
            value = $(this).val()
            id = $(this).find('option:selected').data('id')
            if (value != '') {
                dataParams.kabupaten = value
                getKecamatan(id)
            }
            else {
                delete dataParams.kabupaten
                delete dataParams.kecamatan
                delete dataParams.kelurahan
                getKecamatan(-1)
            }
            refreshData()
        })
        $(".filter-kecamatan").change(function (e) {
            value = $(this).val()
            id = $(this).find('option:selected').data('id')
            if (value != '') {
                dataParams.kecamatan = value
                getKelurahan(id)
            }
            else {
                delete dataParams.kecamatan
                delete dataParams.kelurahan
                getKelurahan(-1)
            }
            refreshData()
        })
        $(".filter-kelurahan").change(function (e) {
            value = $(this).val()
            if (value != '')
                dataParams.kelurahan = value
            else
                delete dataParams.kelurahan
            refreshData()
        })

        function getKecamatan(kabupatenId, ctxInput, ctxIcon, ctxKelurahanInput, callback) {
            getKelurahan(-1, ctxKelurahanInput)
            ctxInput = 0 || ctxInput
            if (!ctxInput) ctxInput = $(".filter-kecamatan")
            ctxIcon = 0 || ctxIcon
            if (!ctxIcon) ctxIcon = $(".icon-kecamatan")
            if (kabupatenId > 0) {
                ctxIcon.removeClass('fa-map-marked-alt')
                ctxIcon.addClass('fa-spin fa-sync')
                ctxInput.attr('disabled', 'disabled');
                $.ajax({
                    type: "GET",
                    url: "{{ route('district.index') }}",
                    data: {
                        city_id: kabupatenId,
                        view_json: true,
                    },
                    dataType: "json"
                })
                .done(function (response) {
                    ctxInput.html("<option value=''>- Piilh kecamatan -</option>")
                    response.data.data.forEach((item) => {
                        option = document.createElement('option')
                        option.value = item.dis_name
                        option.setAttribute('data-id', item.dis_id)
                        option.innerHTML = item.dis_name.toLowerCase().replace(/\b[a-z]/g, letter => letter.toUpperCase())
                        ctxInput.append(option)
                    })
                    callback = 0 || callback;
                    if (callback) callback();
                })
                .always(function () {
                    ctxInput.removeAttr('disabled');
                    ctxIcon.removeClass('fa-spin fa-sync')
                    ctxIcon.addClass('fa-map-marked-alt')
                })
            } 
            else {
                ctxInput.html("<option value=''>- Pilih kecamatan -</option>")
                ctxInput.attr('disabled', 'disabled');
            }
        }
        function getKelurahan(kecamatanId, ctxInput, ctxIcon, callback) {
            ctxInput = 0 || ctxInput
            if (!ctxInput) ctxInput = $(".filter-kelurahan")
            ctxIcon = 0 || ctxIcon
            if (!ctxIcon) ctxIcon = $(".icon-kelurahan")
            if (kecamatanId > 0) {
                ctxIcon.removeClass('fa-map-marked-alt')
                ctxIcon.addClass('fa-spin fa-sync')
                ctxInput.attr('disabled', 'disabled');
                $.ajax({
                    type: "GET",
                    url: "{{ route('subdistrict.index') }}",
                    data: {
                        dis_id: kecamatanId,
                        view_json: true,
                    },
                    dataType: "json"
                })
                .done(function (response) {
                    ctxInput.html("<option value=''>- Pilih kelurahan -</option>")
                    response.data.data.forEach((item) => {
                        option = document.createElement('option')
                        option.value = item.subdis_name
                        option.setAttribute('data-id', item.subdis_id)
                        option.innerHTML = item.subdis_name.toLowerCase().replace(/\b[a-z]/g, letter => letter.toUpperCase())
                        ctxInput.append(option)
                    })
                    callback = 0 || callback;
                    if (callback) callback();
                })
                .always(function () {
                    ctxInput.removeAttr('disabled');
                    ctxIcon.removeClass('fa-spin fa-sync')
                    ctxIcon.addClass('fa-map-marked-alt')
                })
            } 
            else {
                ctxInput.html("<option value=''>- Piilh kelurahan -</option>")
                ctxInput.attr('disabled', 'disabled');
            }
        }

        let modalCreateAdmin = $("#modal-create-admin")
        $(".btn-create-admin").click(function (e) {
            e.preventDefault()
            modalCreateAdmin.modal('show')
        })
        modalCreateAdmin.on('shown.bs.modal', function(e) {
            modalCreateAdmin.find("[name='kabupaten']").change(function (e) {
                value = $(this).val()
                id = $(this).find('option:selected').data('id')
                if (value != '')
                    getKecamatan(id, modalCreateAdmin.find("[name='kecamatan']"), modalCreateAdmin.find(".icon-kecamatan"), modalCreateAdmin.find("[name='kelurahan']"))
                else
                    getKecamatan(-1, modalCreateAdmin.find("[name='kecamatan']"), modalCreateAdmin.find(".icon-kecamatan"), modalCreateAdmin.find("[name='kelurahan']"))
            })
            modalCreateAdmin.find("[name='kecamatan']").change(function (e) {
                value = $(this).val()
                id = $(this).find('option:selected').data('id')
                if (value != '')
                    getKelurahan(id, modalCreateAdmin.find("[name='kelurahan']"), modalCreateAdmin.find(".icon-kelurahan"))
                else
                    getKelurahan(-1, modalCreateAdmin.find("[name='kelurahan']"), modalCreateAdmin.find(".icon-kelurahan"))
            })
            modalCreateAdmin.find("form").submit(function(e) {
                e.preventDefault()
                formData = new FormData(this)
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.store') }}",
                    beforeSend: function (request) {
                        request.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                    },
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    cache: false
                })
                .done(function (response) {
                    $(".filter-berdasarkan[value='username']").prop('checked', true)
                    $(".filter-pencarian").val(response.data.username)
                    dataParams.pencarian = response.data.username
                    dataParams.berdasarkan = 'username'
                    refreshData()
                    modalCreateAdmin.find('.preview-avatar').attr('src', "{{ asset('images/img-unavailable.png') }}")
                    modalCreateAdmin.find('form')[0].reset()
                    modalCreateAdmin.modal('hide')
                    $(".filter-pencarian").focus()
                })
                .fail(function (response) {
                    Object.entries(response.responseJSON.errors).forEach((error) => {
                        const [field, message] = error
                        modalCreateAdmin.find('.error-' + field).html(message).show()
                        modalCreateAdmin.animate({
                            scrollTop: modalCreateAdmin.find('.error-' + field).offset().top * -1
                        }, 1000)
                    })
                })
            })
            modalCreateAdmin.find('#create-admin-avatar').change(function () {
                const fileAvatar = new FileReader()
                fileAvatar.readAsDataURL(this.files[0])
                fileAvatar.onload = function(e) {
                    modalCreateAdmin.find('.preview-avatar').attr('src', e.target.result)
                }
            })
        })

        let modalEditAdmin = $("#modal-edit-admin")
        modalEditAdmin.on('shown.bs.modal', function (e) { 
            modalEditAdmin.find(`[name='kabupaten']`).val('')
            id = modalEditAdmin.find("[name='id']").val()
            url = modalEditAdmin.find("[name='url']").val()
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
            })
            .done(function (response) {
                modalEditAdmin.find('.modal-body > div').hide()
                modalEditAdmin.find("[name='nama_lengkap']").val(response.nama_lengkap)
                modalEditAdmin.find(`[name='jenis_kelamin'][value='${response.jenis_kelamin}']`).prop('checked', true)
                modalEditAdmin.find("[name='username']").val(response.username)
                modalEditAdmin.find("[name='tempat_lahir']").val(response.tempat_lahir)
                modalEditAdmin.find("[name='tanggal_lahir']").val(response.tanggal_lahir)
                modalEditAdmin.find("[name='nomor_hp']").val(response.nomor_hp)
                modalEditAdmin.find("[name='nomor_ktp']").val(response.nomor_ktp)                    
                modalEditAdmin.find("[name='alamat']").val(response.alamat)
                modalEditAdmin.find(".preview-avatar").attr('src', response.avatar_link)
                if (response.kabupaten != null) {
                    modalEditAdmin.find(`[name='kabupaten'] option[data-id='${response.city_id}']`).prop('selected', true)
                    getKecamatan(
                        response.city_id,
                        modalEditAdmin.find("[name='kecamatan']"),
                        modalEditAdmin.find(".icon-kecamatan"),
                        modalEditAdmin.find("[name='kelurahan']"),
                        function () {
                            modalEditAdmin.find(`[name='kecamatan'] option[data-id='${response.dis_id}']`).prop('selected', true)
                            getKelurahan(
                                response.dis_id,
                                modalEditAdmin.find("[name='kelurahan']"),
                                modalEditAdmin.find(".icon-kelurahan"),
                                function () {
                                    modalEditAdmin.find(`[name='kelurahan'] option[data-id='${response.subdis_id}']`).prop('selected', true)
                                }
                            )
                        }
                    )
                }
            })

            modalEditAdmin.find("[name='kabupaten']").unbind('change').change(function (e) {
                value = $(this).val()
                id = $(this).find('option:selected').data('id')
                if (value != '')
                    getKecamatan(id, modalEditAdmin.find("[name='kecamatan']"), modalEditAdmin.find(".icon-kecamatan"), modalEditAdmin.find("[name='kelurahan']"))
                else
                    getKecamatan(-1, modalEditAdmin.find("[name='kecamatan']"), modalEditAdmin.find(".icon-kecamatan"), modalEditAdmin.find("[name='kelurahan']"))
            })
            modalEditAdmin.find("[name='kecamatan']").unbind('change').change(function (e) {
                value = $(this).val()
                id = $(this).find('option:selected').data('id')
                if (value != '')
                    getKelurahan(id, modalEditAdmin.find("[name='kelurahan']"), modalEditAdmin.find(".icon-kelurahan"))
                else
                    getKelurahan(-1, modalEditAdmin.find("[name='kelurahan']"), modalEditAdmin.find(".icon-kelurahan"))
            })
            modalEditAdmin.find('#edit-admin-avatar').unbind('change').change(function () {
                const fileAvatar = new FileReader()
                fileAvatar.readAsDataURL(this.files[0])
                fileAvatar.onload = function(e) {
                    modalEditAdmin.find('.preview-avatar').attr('src', e.target.result)
                }
            })
            modalEditAdmin.find("form").unbind('submit').submit(function(e) {
                e.preventDefault()
                modalEditAdmin.find('.modal-body > div').show()
                formData = new FormData(this)
                url = modalEditAdmin.find("[name='action']").val()
                $.ajax({
                    type: "POST",
                    url: url,
                    beforeSend: function (request) {
                        request.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                    },
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    cache: false
                })
                .done(function (response) {
                    modalEditAdmin.find('.modal-body > div').hide()
                    $(".filter-berdasarkan[value='username']").prop('checked', true)
                    $(".filter-pencarian").val(response.data.username)
                    dataParams.pencarian = response.data.username
                    dataParams.berdasarkan = 'username'
                    refreshData()
                    modalEditAdmin.find('.preview-avatar').attr('src', "{{ asset('images/img-unavailable.png') }}")
                    modalEditAdmin.find('.error-message').hide()
                    modalEditAdmin.find('form')[0].reset()
                    modalEditAdmin.modal('hide')
                    $(".filter-pencarian").focus()
                })
                .fail(function (response) {
                    Object.entries(response.responseJSON.errors).forEach((error) => {
                        const [field, message] = error
                        modalEditAdmin.find('.error-' + field).html(message).show()
                        modalEditAdmin.animate({
                            scrollTop: modalEditAdmin.find('.error-' + field).offset().top * -1
                        }, 1000)
                    })
                })
            })
        })
    })
</script>
@endsection