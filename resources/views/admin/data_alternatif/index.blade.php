@extends('layouts.app')
@section('content')
    <style>
        .custom-color-btn {
            background-color: #FFA63E;
            color: #fff;
            border-color: #FFA63E;
        }

        .table-container {
            margin-bottom: 20px;
        }
    </style>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
 
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning">{{ session('warning') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-container table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_dataAlternatif">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Alternatif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="card-tools d-flex justify-content-between">
                <a class="btn-sm custom-color-btn mt-1" href="{{ route('data_alternatif.create') }}">Tambah Alternatif</a>
            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var dataAlternatif = $('#table_dataAlternatif').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/data_alternatif/list') }}",
                    dataType: "json",
                    type: "POST",
                },
                columns: [{
                    data: "id_alternatif",
                    orderable: true,
                    searchable: true
                }, {
                    data: "nama_alternatif",
                    orderable: true,
                    searchable: true
                }, {
                    data: "aksi",
                    orderable: false,
                    searchable: false
                }]
            });
        });
    </script>
@endpush
