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
                    <tbody>
                        {{-- <tr>
                            <td>10203040506070809</td>
                            <td>Anto</td>
                            <td>Malang</td>
                            <td>1990-05-15</td>
                            <td>O</td>
                            <td>Laki-laki</td>
                            <td>
                                <a href="{{ url('DataPenduduk/detail/') }}" class="btn btn-info">Detail</a>
                                <button class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>10908070605040302</td>
                            <td>Ana</td>
                            <td>Malang</td>
                            <td>1995-10-20</td>
                            <td>A</td>
                            <td>Perempuan</td>
                            <td>
                                <a href="{{ url('DataPenduduk/detail/') }}" class="btn btn-info">Detail</a>
                                <button class="btn btn-danger">Hapus</button>
                            </td>
                        </tr> --}}


                    </tbody>
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
    {{-- <script>
        $(document).ready(function() {
            var dataUser = $('#table_level').DataTable({
                serverSide: true, // serverSide: true, jika ingin menggunakan server side processing
                ajax: {
                    "url": "{{ url('level/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.level_id = $('#level_id').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "level_kode", // Menggunakan level_kode langsung dari hasil query
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "level_nama", // Menggunakan level_nama langsung dari hasil query
                        className: "",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    }
                ]

            });
            $('#level_id').on('change', function() {
                dataUser.ajax.reload();
            });

        });
    </script> --}}
@endpush
