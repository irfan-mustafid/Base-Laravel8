@extends('welcome')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
        </section>
        <div class="section-body">
            <h2>Tabel Proses</h2>
            <p class="section-lead">Table Coba</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tes table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>No Dokumen</th>
                                            <th>Nama Pekerjaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $dt)
                                            <tr>
                                                <td>{{ $dt->spk_no }}</td>
                                                <td>{{ $dt->project_name }}</td>
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
@endsection
