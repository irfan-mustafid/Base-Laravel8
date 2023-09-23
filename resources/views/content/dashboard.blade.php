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

                                <table class="table table-bordered table-md" id="table-coba">
                                    <thead>
                                        <tr>
                                            <th>No Dokumen</th>
                                            <th>Nama Pekerjaan</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $dt)
                                            <tr>
                                                <td>{{ $dt->spk_no }}</td>
                                                <td>{{ $dt->project_name }}</td>
                                                <td style="text-align: center">
                                                    <a href="#exampleModal" data-toggle="modal"
                                                        onclick="edit('{{ $dt->tender_id }}', '{{ $dt->project_name }}')">
                                                        <i class="ion-edit"></i>
                                                    </a>
                                                </td>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="project_id" id="project_id">
                    </div>
                    <div class="form-group">
                        <label for="">Name Project</label>
                        <input type="text" class="form-control" name="project_name" id="project_name">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="simpan_modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('content.jsdashboard')
@endsection
