@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('admin/pinjam/'.$pinjam->id) }}" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}

                <div class="form-group row">
                    <label for="peminjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('peminjam') is-invalid @enderror"
                            id="peminjam" name="peminjam" value="{{ old('peminjam', $pinjam->peminjam) }}" required>
                        @error('peminjam')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inventaris_id" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <select class="form-control @error('inventaris_id') is-invalid @enderror" id="inventaris_id"
                            name="inventaris_id" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach ($inventaris as $item)
                                <option value="{{ $item->inventaris_id }}"
                                    {{ old('inventaris_id', $pinjam->inventaris_id) == $item->inventaris_id ? 'selected' : '' }}>
                                    {{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                        @error('inventaris_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                            id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', $pinjam->tanggal_pinjam) }}" required>
                        @error('tanggal_pinjam')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror"
                            id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali', $pinjam->tanggal_kembali) }}" required>
                        @error('tanggal_kembali')
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

