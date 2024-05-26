@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit KK</div>

        <div class="card-body">
            <form method="POST" action="{{ url('admin/data_kk/'.$kk->no_kk) }}">

            @csrf
                {!! method_field('PUT') !!}

                <div class="form-group row">
                    <label for="no_kk" class="col-sm-2 col-form-label">Nomor KK</label>
                    <input type="text" class="form-control col-sm-10" id="no_kk" name="no_kk" value="{{ $kk->no_kk }}">
                    @error('no_kk')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="kepala_keluarga " class="col-sm-2 col-form-label">Kepala Keluarga</label>
                    <input type="text" class="form-control col-sm-10" id="kepala_keluarga" name="kepala_keluarga"
                        value="{{ $kk->kepala_keluarga }}">
                    @error('kepala_keluarga')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label ></label>
                    <div class="pt-2">
                        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-danger" href="{{ route('data_kk.index') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
