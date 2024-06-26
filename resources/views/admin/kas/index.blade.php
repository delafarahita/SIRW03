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
                <table class="table table-bordered table-striped table-hover table-sm" id="table_kas">
                    <thead>
                        <tr>
                            <th>RT</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="card-tools d-flex justify-content-between">
                <a class="btn-sm custom-color-btn mt-1" href="{{ route('kas.create') }}">Tambah Data Kas</a>
            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var kas = $('#table_kas').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/kas/list') }}",
                    type: "POST",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}"; // Add CSRF token
                    },
                    dataType: "json",
                },
                columns: [
                    { data: "id_rt", className: "text-center", orderable: true, searchable: true },
                    { data: "keterangan", className: "text-center", orderable: true, searchable: true },
                    { data: "tanggal", className: "text-center", orderable: true, searchable: true },
                    { data: "pemasukan", className: "text-center", orderable: true, searchable: true },
                    { data: "pengeluaran", className: "text-center", orderable: true, searchable: true },
                    { data: "aksi", className: "text-center", orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush
