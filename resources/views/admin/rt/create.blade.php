@extends('layouts.app')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('admin/data_rt/') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="id_rt" class="col-sm-2 col-form-label">Nomor RT<small class="text-danger">*</small></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('id_rt') is-invalid @enderror" id="id_rt" name="id_rt" value="{{ old('id_rt') }}" required>
                        @error('id_rt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_rt" class="col-sm-2 col-form-label">Nama RT<small class="text-danger">*</small></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama_rt') is-invalid @enderror" id="nama_rt" name="nama_rt" value="{{ old('nama_rt') }}" required>
                        @error('nama_rt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        <a href="{{ route('data_rt.index') }}" class="btn btn-danger btn-sm btn-block">Kembali</a"></a>
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
