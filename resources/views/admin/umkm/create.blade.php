@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('umkm.store') }}" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">Nama Usaha</label>
                            <input type="text" class="form-control" id="nama_usaha" name="nama_usaha"
                                value="{{ old('nama_usaha') }}" required>
                            @error('nama_usaha')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Pemilik Usaha</label>
                            <input type="text" class="form-control" id="nama_pemilik_usaha" name="nama_pemilik_usaha"
                                value="{{ old('nama_pemilik_usaha') }}" required>
                            @error('nama_pemilik_usaha')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat Usaha</label>
                            <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha"
                                value="{{ old('alamat_usaha') }}" required>
                            @error('alamat_usaha')
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
                            <label class="control-label">Deskripsi Usaha</label>
                            <textarea class="form-control @error('deskripsi_usaha') is-invalid @enderror" placeholder=""
                            name="deskripsi_usaha" id="floatingTextarea" style="height: 200px"></textarea>
                            @error('deskripsi_usaha')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        <a href="{{ route('kategori_dagang.index') }}" class="btn btn-danger btn-sm btn-block">Kembali</a">
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
