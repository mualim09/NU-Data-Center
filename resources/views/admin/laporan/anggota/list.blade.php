@extends('argon.main')

@section('navbar-item')

    <li class="nav-item">
        <a href="#" class="nav-link">Anggota</a>
    </li>
@endsection


@section('content')
    <header class="pb-6 pt-5 bg-gradient-red">
        <div class="container-fluid">
            <div class="row">
                <div class="col d-flex justify-content-start align-items-center">
                    <i class="fas fa-list-alt text-white mr-4" style="font-size: 40px"></i>
                    <div class="mb-1">
                        <h2 class="text-white font-weight-bolder text-uppercase mb-0">Laporan Data Anggota</h2>
                        <div class="text-xs text-uppercase font-weight-bolder" style="color: rgb(230, 181, 181)">
                            {{ \Carbon\Carbon::now()->format('H:i:s, d F Y') }}
                        </div>
                    </div>
                </div>
                <div class="col-auto d-flex">
                    <div class="mr-2">
                        <button onclick="window.print()" class="btn btn-secondary btn-sm">
                            <i class="fas fa-print mr-1"></i>
                            Cetak
                        </button>
                    </div>
                    <div>
                        <form action="{{ route('admin.laporan.anggota.export') }}" method="POST">
                            @csrf
                            <button type='submit' class="btn btn-sm btn-success" style="background-color: #099543; border-color: #099543">
                                <i class="fas fa-file-excel mr-1"></i>
                                Export
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt--5">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header pt-2">
                        <div class="row">
                            <div class="col-md pr-md-1">
                                <div class="form-group mb-0">
                                    <label>Pencarian Nama</label>
                                    <div class="input-group-merge input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm filter-nama" placeholder="Cari nama...">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md pl-md-1 pr-md-1">
                                <div class="form-group mb-0">
                                    <label>Jenis kelamin</label>
                                    <div class="input-group-merge input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-venus-mars"></i>
                                            </span>
                                        </div>
                                        <select class="form-control form-control-sm filter-jenis_kelamin">
                                            <option value="">-Pilih jenis kelamin-</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md pl-md-1 pr-md-1">
                                <div class="form-group mb-0">
                                    <label>Kecamatan</label>
                                    <div class="input-group-merge input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-marked-alt"></i>
                                            </span>
                                        </div>
                                        <select class="form-control form-control-sm filter-kecamatan">
                                            <option value="">-Pilih kecamatan-</option>
                                            @foreach ($dataKecamatan as $kecamatan)
                                                <option value="{{ $kecamatan }}">{{ ucwords(strtolower($kecamatan)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md pl-md-1">
                                <div class="form-group mb-0">
                                    <label>Kelurahan</label>
                                    <div class="input-group-merge input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-marker-alt icon-kelurahan"></i>
                                            </span>
                                        </div>
                                        <select class="form-control form-control-sm filter-kelurahan" id="load-kelurahan">
                                            <option value="">-Pilih kelurahan-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md pr-md-1">
                                <div class="form-group mb-0">
                                    <label>No KTP</label>
                                    <div class="input-group-merge input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm filter-no_ktp" placeholder="cari dengan no ktp...">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md pr-md-1 pl-md-1">
                                <div class="form-group mb-0">
                                    <label>No KartaNU</label>
                                    <div class="input-group-merge input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm filter-no_kartanu" placeholder="cari dengan no kartanu...">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md pr-md-1 pl-md-1">
                                <div class="form-group mb-0">
                                    <label>Limit</label>
                                    <div class="input-group-merge input-group input-group-sm">
                                        <input value="50" type="number" min="1" step="5" class="form-control form-control-sm filter-limit" placeholder="Batas jumlah baris...">
                                        <div class="input-group-append">
                                            <span class="input-group-text text-xs">
                                                Baris
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md pl-md-1">
                                <div class="form-group mb-0">
                                    <label>Halaman</label>
                                    <div class="input-group-merge input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-sm btn-warning btn-previous-page">
                                                <i class="fas fa-arrow-left"></i>
                                            </button>
                                        </div>
                                        <input type="number" min="1" value="1" class="text-center form-control form-control-sm filter-page">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-warning btn-next-page">
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2 class="text-uppercase text-center font-weight-bolder mb-5 mt-3">Laporan Data Anggota Organisasi</h2>
                        <div class="table-responsive">
                            <table class="load-filter table table-sm table-condensed"></table>
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width: 56px">No</th>
                                        <th style="width: 27%">Nama lengkap</th>
                                        <th style="width: 15">TTL</th>
                                        <th style="width: 15%">Alamat</th>
                                        <th>Jabatan</th>
                                        <th>No KTP</th>
                                        <th>No KartaNU</th>
                                    </tr>
                                </thead>
                                <tbody class="load-anggota">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('print')
    <h2 class="text-uppercase text-center font-weight-bolder mb-5 mt-3">Laporan Data Anggota Organisasi</h2>
        <div class="table-responsive">
            <table class="load-filter table table-sm table-condensed"></table>
            <table class="table table-sm table-condensed table-striped">
                <thead class="thead-light">
                    <tr>
                        <th style="width: 56px">No</th>
                        <th style="width: 24%">Nama lengkap</th>
                        <th style="width: 14%">TTL</th>
                        <th style="width: 30%">Alamat</th>
                        <th>Jabatan</th>
                        <th>No KTP</th>
                        <th>No KartaNU</th>
                    </tr>
                </thead>
                <tbody class="load-anggota">
                </tbody>
            </table>
        </div>
@endsection
@section('js_scripts')

    <script>
        const dataParams = {
            view_content: 'admin.laporan.anggota.ajax.table',
            view_pagination: 'admin.laporan.anggota.ajax.pagination',
            view_filter: 'admin.laporan.anggota.ajax.filter',
            limit: 50,
        }
        function refreshData() {
            $.ajax({
                type: "GET",
                url: "{{ route('anggota.index') }}",
                data: dataParams,
                dataType: "json",
            })
            .done(function(data) {
                $('.load-anggota').html(data.content)
                $('.load-filter').html(data.filter)
            })
            .always(function() {
            })
        }
        refreshData()
        function getKelurahan(kecamatan, callback) {
            $.ajax({
                type: "GET",
                url: "{{ route('wilayah.index') }}",
                data: {
                    kecamatan: kecamatan,
                    mode: 'kelurahan'
                },
                dataType: "json",
            })
            .done(function (data) {
                if (data.status == 'success') {
                    $("select.filter-kelurahan").html(`<option value=''>-Pilih kelurahan-</option>`)
                    data.data.forEach(function (wilayah) {
                        option = document.createElement('option')
                        option.value = wilayah.kelurahan
                        option.innerHTML = wilayah.kelurahan.toLowerCase().replace(/\b[a-z]/g, letter => letter.toUpperCase())
                        $("select.filter-kelurahan").append(option)
                    })
                    callback = callback || 0;
                    if (callback) callback()
                }
            })
        }

        $(".filter-kecamatan").change(function (e) {
            e.preventDefault()
            $(".icon-kelurahan").removeClass('fa-map-marker-alt')
            $(".icon-kelurahan").addClass('fa-spinner fa-spin')
            getKelurahan($(this).val(), function() {
                $(".icon-kelurahan").removeClass('fa-spinner fa-spin')
                $(".icon-kelurahan").addClass('fa-map-marker-alt')
            })
            kecamatan = $(this).val()
            if (kecamatan != '') dataParams.kecamatan = kecamatan
            else delete dataParams.kecamatan
            refreshData()
        })
        $(".filter-kelurahan").change(function (e) {
            kelurahan = $(this).val()
            if (kelurahan != '') dataParams.kelurahan = kelurahan
            else delete dataParams.kelurahan
            refreshData()
        })
        $(".filter-nama").change(function (e) {
            nama = $(this).val()
            if (nama != '') dataParams.nama = nama
            else delete dataParams.nama
            refreshData()
        })
        $(".filter-jenis_kelamin").change(function (e) {
            jenis_kelamin = $(this).val()
            if (jenis_kelamin != '') dataParams.jenis_kelamin = jenis_kelamin
            else delete dataParams.jenis_kelamin
            refreshData()
        })
        $(".filter-no_ktp").change(function (e) {
            no_ktp = $(this).val()
            if (no_ktp != '') dataParams.no_ktp = no_ktp
            else delete dataParams.no_ktp
            refreshData()
        })
        $(".filter-no_kartanu").change(function (e) {
            no_kartanu = $(this).val()
            if (no_kartanu != '') dataParams.no_kartanu = no_kartanu
            else delete dataParams.no_kartanu
            refreshData()
        })
        $(".filter-limit").change(function (e) {
            limit = $(this).val()
            if (limit != '') dataParams.limit = limit
            else delete dataParams.limit
            refreshData()
        })
        $(".filter-page").change(function (e) {
            page = $(this).val()
            if (page != '') dataParams.page = page
            else delete dataParams.page
            refreshData()
        })
        $(".btn-previous-page").click(function (e) {
            page = $('.filter-page').val()
            if (page <= 0) page = 1
            page--
            if (page > 0) {
                $('.filter-page').val(page)
                $('.filter-page').trigger('change')
            } else {
                $('.filter-page').val(1)
            }
        })
        $(".btn-next-page").click(function (e) {
            page = $('.filter-page').val()
            if (page <= 0) page = 1
            page++
            if (page > 0) {
                $('.filter-page').val(page)
                $('.filter-page').trigger('change')
            } else {
                $('.filter-page').val(1)
            }
        })
    </script>

@endsection


