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

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-icon {
            background-color: transparent;
            border: none;
            padding: 0;
            margin: 0;
        }

        .btn-icon i {
            font-size: 24px;
            color: blue;
        }
    </style>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <button type="button" class="btn-icon" id="modalButton" data-bs-toggle="modal"
                data-bs-target="#petunjukModal">
                <i class="fa fa-exclamation-circle"></i>
            </button>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-container table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_dataPenduduk">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Gol. Darah</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="card-tools d-flex justify-content-between">
                <a class="btn-sm custom-color-btn mt-1" href="{{ route('data_penduduk.create') }}">Tambah Penduduk</a>
                <form action="{{ route('data_penduduk.export') }}" method="get">
                    <button class="btn-sm custom-color-btn mt-1" type="submit">Download Seluruh Data</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="petunjukModal" tabindex="-1" aria-labelledby="petunjukModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="petunjukModalLabel">Panduan Pengisian Data Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Untuk mengisi data penduduk pastikan sudah mengisi terlebih dahulu untuk data KK dan data RT</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush

@push('js')
    <script>
        $(document).ready(function() {
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
                    orderable: false,
                    searchable: false
                }]
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var petunjukModal = new bootstrap.Modal(document.getElementById('petunjukModal'));
            document.getElementById('modalButton').addEventListener('click', function() {
                petunjukModal.show();
            });
        });
    </script>
@endpush
