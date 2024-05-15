@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('kegiatan.update', $kegiatan->nama) }}" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $kegiatan->nama }}" >
                            @error('nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis</label>
                            <select class="form-control" id="jenis" name="jenis">
                                <option value="">- Pilih -</option>
                                @foreach ($jenis as $item)
                                    <option value="{{ $item->jenis }}"
                                        @if ($item->jenis == $kegiatan->jenis) selected @endif>{{ $item->jenis }}</option>
                                @endforeach
                            </select>
                            @error('jenis')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                value="{{ $kegiatan->deskripsi }}" required>
                            @error('deskripsi')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Image Path</label>
                            <input type="file" class="form-control" id="image_path" name="image_path"
                                value="{{ $kegiatan->image_path }}" required>
                            @error('image_path')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="{{ $kegiatan->tanggal }}" required>
                            @error('tanggal')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                <div class="form-group row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
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
