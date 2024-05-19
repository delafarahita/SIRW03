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

            <div class="table-container table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_inventaris">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="card-tools d-flex justify-content-between">
                <a class="btn-sm custom-color-btn mt-1" href="{{ url('admin/inventaris/create') }}">Tambah Inventaris</a>
                <a class="btn-sm custom-color-btn mt-1" href="{{ url('admin/pinjam/create') }}">Tambah Peminjam</a>
            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var inventaris = $('#table_inventaris').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/inventaris/list') }}",
                    dataType: "json",
                    type: "POST",
                },
                columns: [{
                        data: 'inventaris_id',
                    },
                    {
                        data: 'nama_barang',

                    },
                    {
                        data: 'jenis_barang',

                    },
                    {
                        data: 'jumlah_barang',

                    },
                    {
                        data: 'status_barang',
                    },{
                        data: 'aksi',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
