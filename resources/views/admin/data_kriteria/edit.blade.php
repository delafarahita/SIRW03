@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Kriteria</div>

        <div class="card-body">
            <form method="POST" action="{{ url('admin/data_kriteria/'.$kriteria->id_kriteria) }}">

            @csrf
                {!! method_field('PUT') !!}

                <div class="form-group row">
                    <label for="kode_kriteria" class="col-sm-2 col-form-label">Kode Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kode_kriteria') is-invalid @enderror" id="kode_kriteria" name="kode_kriteria" value="{{ $kriteria->kode_kriteria }}" required>
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
                        <input type="text" class="form-control @error('nama_kriteria') is-invalid @enderror" id="nama_kriteria" name="nama_kriteria" value="{{ $kriteria->nama_kriteria }}" required>
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
                        <input type="text" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" value="{{ $kriteria->bobot }}" required>
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
                        <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" value="{{ $kriteria->jenis }}" required>
                        @error('jenis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label ></label>
                    <div class="pt-2">
                        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-primary" href="{{ route('data_kriteria.index') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
