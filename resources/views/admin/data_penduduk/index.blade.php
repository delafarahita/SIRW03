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
                <table class="table table-bordered table-striped table-hover table-sm" id="table_dataPenduduk">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            {{-- <th>No. KK</th> --}}
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Gol. Darah</th>
                            <th>Jenis Kelamin</th>
                            {{-- <th>Alamat</th> --}}
                            {{-- <th>RT</th> --}}
                            {{-- <th>RT</th> --}}
                            {{-- <th>Kelurahan</th> --}}
                            {{-- <th>Kecamatan</th> --}}
                            {{-- <th>Kewarganegaraan</th> --}}
                            {{-- <th>Pekerjaan</th> --}}
                            {{-- <th>Agama</th> --}}
                            {{-- <th>Domisili</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="card-tools d-flex justify-content-between">
                <a class="btn-sm custom-color-btn mt-1" href="{{ route('data_penduduk.create') }}">Tambah Penduduk</a>
                <a class="btn-sm custom-color-btn mt-1" href="{{ url('DataPenduduk/create') }}">Download Seluruh Data</a>
            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        $(documet).ready(function() {
            var dataPenduduk = $('#table_dataPenduduk').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/data_penduduk/list') }}",
                    dataType: "json",
                    type: "POST",
                },
                columns: [{
                    data: "nik",
                    className: "text-center",
                    orderable: true,
                    searchable: true,
                }, {
                    data: "nama",
                    className: "text-center",
                    orderable: true,
                    searchable: true,
                }, {
                    data: "tempat_lahir",
                    className: "text-center",
                    orderable: true,
                    searchable: true
                }, {
                    data: "tanggal_lahir",
                    className: "text-center",
                    orderable: true,
                    searchable: true
                }, {
                    data: "gol_darah",
                    className: "text-center",
                    orderable: true,
                    searchable: true
                }, {
                    data: "jenis_kelamin",
                    className: "text-center",
                    orderable: true,
                    searchable: true
                }, {
                    data: "aksi",
                    className: "text-center",
                    orderable: true,
                    searchable: true
                }]
            });
        });
    </script>
@endpush
