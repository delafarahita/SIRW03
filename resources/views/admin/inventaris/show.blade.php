@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h4>Keterangan Inventaris</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nama Barang:</strong> {{ $inventaris->nama_barang }}</p>
                            <p><strong>Jenis Barang:</strong> {{ $inventaris->jenis_barang }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Jumlah Barang:</strong> {{ $inventaris->jumlah_barang }}</p>
                            <p><strong>Status Barang:</strong> {{ $inventaris->status_barang }}</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 table-responsive">
                    <h4>Daftar Peminjam</h4>
                    {{-- @if ($pinjamInventaris->count() > 0) --}}
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pinjamInventaris as $peminjaman)
                                <tr>
                                    <td>{{ $peminjaman->peminjam }}</td>
                                    <td>{{ $peminjaman->tanggal_pinjam }}</td>
                                    <td>{{ $peminjaman->tanggal_kembali }}</td>
                                    <td>
                                        <a href="{{ url('admin/pinjam/' . $peminjaman->id . '/edit') }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ url('admin/pinjam/' . $peminjaman->id ) }}"
                                            method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- @else
                        <p>Tidak ada data peminjaman</p>
                    @endif --}}
                </div>
            </div>

            <div class="form-group row mt-3">
                <div class="col-12">
                    <a href="{{ url('admin/inventaris') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .table-sm {
            table-layout: responsive;
        }

        .btn-block {
            width: auto;
        }

        .custom-color-btn {
            background-color: #FFA63E;
            color: #fff;
            border-color: #FFA63E;
        }
    </style>
@endpush
@push('js')
@endpush
