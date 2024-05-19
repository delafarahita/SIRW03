@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Kriteria</div>

        <div class="card-body">
            <form method="POST" action="{{ url('admin/data_alternatif/'.$alternatif->id_alternatif  ) }}">

            @csrf
                {!! method_field('PUT') !!}

                <div class="form-group row">
                    <label for="nama_alternatif" class="col-sm-2 col-form-label">Nama alternatif</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama_alternatif') is-invalid @enderror" id="nama_alternatif" name="nama_alternatif" value="{{ $alternatif->nama_alternatif }}" required>
                        @error('nama_alternatif')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        <a href="{{ route('data_alternatif.index') }}" class="btn btn-danger btn-sm btn-block">Kembali</a"></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
