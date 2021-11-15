@extends('argon.main')


@section('content')

<header class="bg-blue py-6"></header>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg-6">
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
                    <table class="table table-striped table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No KTP</th>
                                <th>No Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Badar Wildanie</td>
                                <td>L</td>
                                <td>Jawa Timur</td>
                                <td>3507100123123132</td>
                                <td>082228111059</td>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Badar Wildanie</td>
                                <td>L</td>
                                <td>Jawa Timur</td>
                                <td>3507100123123132</td>
                                <td>082228111059</td>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Badar Wildanie</td>
                                <td>L</td>
                                <td>Jawa Timur</td>
                                <td>3507100123123132</td>
                                <td>082228111059</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection();