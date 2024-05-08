@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('admin/data_kriteria/') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="kode_kriteria" class="col-sm-2 col-form-label">Kode Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kode_kriteria') is-invalid @enderror" id="kode_kriteria" name="kode_kriteria" value="{{ old('kode_kriteria') }}" required>
                        @error('kode_kriteria')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_kriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama_kriteria') is-invalid @enderror" id="nama_kriteria" name="nama_kriteria" value="{{ old('nama_kriteria') }}" required>
                        @error('nama_kriteria')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bobot" class="col-sm-2 col-form-label">Bobot Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" value="{{ old('bobot') }}" required>
                        @error('bobot')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis" class="col-sm-2 col-form-label">Jenis Kriteria</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jenis" name="jenis" required>
                            <option value="">- PILIH -</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        @error('jenis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        <a href="{{ route('data_kriteria.index') }}" class="btn btn-danger btn-sm btn-block">Kembali</a"></a>
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
