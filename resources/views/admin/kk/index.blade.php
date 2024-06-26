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
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-container table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_dataKK">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nomor Kartu Keluarga</th>
                            <th>Kepala Keluarga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="card-tools d-flex justify-content-between">
                <a class="btn-sm custom-color-btn mt-1" href="{{ route('data_kk.create') }}">Tambah KK</a>
            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var dataKk = $('#table_dataKK').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/data_kk/list') }}",
                    dataType: "json",
                    type: "POST",
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "no_kk",
                    orderable: true,
                    searchable: true
                }, {
                    data: "kepala_keluarga",
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
