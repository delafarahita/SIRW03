@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('admin/inventaris/') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                            id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" required>
                        @error('nama_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_barang" class="col-sm-2 col-form-label">Jenis Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('jenis_barang') is-invalid @enderror"
                            id="jenis_barang" name="jenis_barang" value="{{ old('jenis_barang') }}" required>
                        @error('jenis_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah_barang" class="col-sm-2 col-form-label">Jumlah Barang</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('jumlah_barang') is-invalid @enderror"
                            id="jumlah_barang" name="jumlah_barang" value="{{ old('jumlah_barang') }}" required>
                        @error('jumlah_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        <a href="{{ route('inventaris.index') }}" class="btn btn-danger btn-sm btn-block">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .btn-block {
            width: auto;
        }
    </style>
@endpush
@push('js')
@endpush
