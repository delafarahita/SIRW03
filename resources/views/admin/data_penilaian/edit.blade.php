@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <h5>->{{$alternatif->nama_alternatif}}</h5>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('admin/data_penilaian/'. $penilaian->id_penilaian) }}" class="form-horizontal">
                @csrf
                    {!! method_field('PUT') !!}
                <input type="hidden" name="id_alternatif" value="{{ $alternatif->id_alternatif }}">
                @foreach ($kriteria as $krit)
                    @php
                        $penilaian = $alternatif->penilaians()->where('id_kriteria', $krit->id_kriteria)->first();
                        $nilai = $penilaian ? $penilaian->nilai : null;
                    @endphp
                    <div class="form-group row">
                        <label for="nilai" class="col-sm-2 col-form-label">{{ $krit->nama_kriteria }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nilai.*') is-invalid @enderror" id="nilai" name="nilai[]" value="{{ old('nilai.'.$loop->index, $nilai) }}" required>
                            @error('nilai.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach
                <div class="form-group row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        <a href="{{ route('data_penilaian.index') }}" class="btn btn-danger btn-sm btn-block">Kembali</a>
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
