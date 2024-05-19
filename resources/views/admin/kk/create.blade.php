@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('admin/data_kk/') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="no_kk" class="col-sm-2 col-form-label">Nomor KK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk" value="{{ old('no_kk') }}" required>
                        @error('no_kk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kepala_keluarga" class="col-sm-2 col-form-label">Kepala Keluarga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kepala_keluarga') is-invalid @enderror" id="kepala_keluarga" name="kepala_keluarga" value="{{ old('kepala_keluarga') }}" required>
                        @error('kepala_keluarga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        <a href="{{ route('data_kk.index') }}" class="btn btn-danger btn-sm btn-block">Kembali</a"></a>
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
