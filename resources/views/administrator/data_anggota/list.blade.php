@extends('argon.main')


@section('content')

<header class="bg-blue py-6"></header>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <div class="row align-content-between">
                        <div class="col">
                            <h4 class="card-title mb-0">This is a test card</h4>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-sm btn-primary">Pick a winner</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-flush yajra-datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection();


@section('js_scripts')
<script src="{{ asset('thirdparty/jquery-datatables/jquery.datatables.min.js') }}"></script>
<script>
    $(function() {
        let table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'gender', name: 'gender'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        })
    })
</script>
@endsection