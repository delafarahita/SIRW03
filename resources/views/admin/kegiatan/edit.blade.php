@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('kegiatan.update', $kegiatan->id) }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">Nama kegiatan</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kegiatan->nama }}">
                            @error('nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Kegiatan</label>
                            <select class="form-control" id="jenis" name="jenis">
                                {{-- <option value="">{{$jenis}}</option> --}}
                                <option value="">- Pilih Jenis Kegiatan -</option>
                                @foreach ($jenis as $item)
                                    <option value="{{ $item }}"
                                        @if ($item == $kegiatan->jenis) selected @endif>{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('jenis')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $kegiatan->alamat }}">
                            @error('alamat')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $kegiatan->tanggal }}" required>
                            @error('tanggal')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Foto kegiatan</label>
                            <input type="file" class="form-control" id="image_path" name="image_path">
                            @error('image_path')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 200px" required>{{ $kegiatan->deskripsi }}</textarea>
                            @error('deskripsi')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                            <a class="btn btn-sm btn-danger" href="{{ route('kegiatan.index') }}">Kembali</a>
                        </div>
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
