@extends('argon.main')

@section('title') List data anggota - Admin PW IPNU @endsection

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
                        <div class="col-md-auto">
                            <h3 class="card-title mb-0 mr-4">Daftar Anggota</h3>
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
                                            <input type="text" class="form-control form-control-sm filter-nama" placeholder="Cari nama disini...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-auto pl-md-1">
                                    <div class="form-group mb-0">
                                        <label>Cari Berdasarkan</label><br/>
                                        <div class="custom-control custom-control-inline custom-radio">
                                            <input type="radio" class="custom-control-input" name="cari_berdasarkan" value="username" id="cari-nama_lengkap" checked>
                                            <label for="cari-nama_lengkap" class="custom-control-label text-capitalize font-weight-normal" style="font-size: 10px; line-height: 24px;">Nama lengkap</label>
                                        </div>
                                        <div class="custom-control custom-control-inline custom-radio">
                                            <input type="radio" class="custom-control-input" name="cari_berdasarkan" value="username" id="cari-username">
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
                                        <a href="{{ route('admin.data_anggota.create') }}" class="btn btn-success rounded-circle btn-sm" data-toggle='tooltip' title="Tambah data anggota" data-placement="left">
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
                                                    <i class="fas fa-map-marked-alt"></i>
                                                </span>
                                            </div>
                                            <select class="form-control filter-kecamatan">
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
                                                    <i class="fas fa-map-marked-alt"></i>
                                                </span>
                                            </div>
                                            <select class="form-control filter-kelurahan">
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
        }

        @if (session()->has('anggota_nama'))
            $(".filter-nama").val(`{{ session('anggota_nama') }}`)
            dataParams.nama = '{{ session('anggota_nama') }}'
            refreshData()
            $(".filter-nama").focus()
        @else
            refreshData()
        @endif

        $(".filter-pencarian").on('input', function(e) {
            value = $(this).val()
            if (value != '')
                dataParams.nama = value
            else 
                delete dataParams.nama
            refreshData()
        })
        $(".filter-limit").change(function(e) {
            value = $(this).val()
            if (value != '')
                if (value > 0)
                    dataParams.limit = value
                else
                    $(this).value(50)
            else 
                delete dataParams.limit
            refreshData()
        })
    });
</script>
@endsection