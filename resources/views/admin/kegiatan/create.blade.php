@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('kegiatan.store') }}" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">Nama kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                                value="{{ old('nama_kegiatan') }}" required>
                            @error('nama_kegiatan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kategori kegiatan</label>
                            <select class="form-control" name="jenis" id="jenis" required>
                                <option value="">- Pilih Kategori kegiatan -</option>
                                @foreach ($jenis as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('jenis')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Pemilik kegiatan</label>
                            <input type="text" class="form-control" id="pemilik_kegiatan" name="pemilik_kegiatan"
                                value="{{ old('pemilik_kegiatan') }}" required>
                            @error('pemilik_kegiatan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat kegiatan</label>
                            <input type="text" class="form-control" id="alamat_kegiatan" name="alamat_kegiatan"
                                value="{{ old('alamat_kegiatan') }}" required>
                            @error('alamat_kegiatan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">RT</label>
                            <select class="form-control" name="id_rt" id="id_rt" required>
                                <option value="">- Pilih</option>
                                @foreach ($rt as $item)
                                    <option value="{{ $item->id_rt }}">{{ $item->id_rt }}</option>
                                @endforeach
                            </select>
                            @error('id_rt')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">RW</label>
                            <input type="number" class="form-control" id="rw" name="rw"
                                value="{{ old('rw') }}" required>
                            @error('rw')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kel/Desa</label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                                value="{{ old('kelurahan') }}" required>
                            @error('kelurahan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                value="{{ old('kecamatan') }}" required>
                            @error('kecamatan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">Deskripsi kegiatan</label>
                            <textarea class="form-control @error('deskripsi_kegiatan') is-invalid @enderror" placeholder=""
                            name="deskripsi_kegiatan" id="floatingTextarea" style="height: 200px"></textarea>
                            @error('deskripsi_kegiatan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">Foto kegiatan</label>
                            <input type="file" name="foto_kegiatan" class="form-control @error('foto_kegiatan') is-invalid @enderror" placeholder=""
                            name="foto_kegiatan"></input>
                            @error('foto_kegiatan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        <a href="{{ route('kegiatan.index') }}" class="btn btn-danger btn-sm btn-block">Kembali</a">
                        </a>
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
