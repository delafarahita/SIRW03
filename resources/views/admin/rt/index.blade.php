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
                <div class="alert alert-success">{{ session('error') }}</div>
            @endif

            <div class="table-container">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_dataRT">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nomor RT</th>
                            <th>Nama RT</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="card-tools d-flex justify-content-between">
                <a class="btn-sm custom-color-btn mt-1" href="{{ route('data_rt.create') }}">Tambah RT</a>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var dataRt = $('#table_dataRT').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/data_rt/list') }}",
                    dataType: "json",
                    type: "POST",
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "id_rt",
                    className: "text-center",
                    orderable: true,
                    searchable: true
                }, {
                    data: "nama_rt",
                    className: "text-center",
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
