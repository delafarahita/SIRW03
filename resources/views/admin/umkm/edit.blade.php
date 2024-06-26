@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('admin/umkm/'.$umkm->id_umkm) }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                {!! method_field('PUT') !!}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">Nama Usaha</label>
                            <input type="text" class="form-control" id="nama_umkm" name="nama_umkm"
                                value="{{ $umkm->nama_umkm }}" required>
                            @error('nama_umkm')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kategori Usaha</label>
                            <select class="form-control" name="kategori_umkm" id="kategori_umkm" required>
                                <option value="">- Pilih Kategori umkm -</option>
                                @foreach ($kategori_umkm as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('kategori_umkm')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Pemilik Usaha</label>
                            <input type="text" class="form-control" id="pemilik_umkm" name="pemilik_umkm"
                                value="{{ $umkm->pemilik_umkm }}" required>
                            @error('pemilik_umkm')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat Usaha</label>
                            <input type="text" class="form-control" id="alamat_umkm" name="alamat_umkm"
                                value="{{ $umkm->alamat_umkm }}" required>
                            @error('alamat_umkm')
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
                                value="{{ $umkm->rw }}" required>
                            @error('rw')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kel/Desa</label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                                value="{{ $umkm->kelurahan }}" required>
                            @error('kelurahan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                value="{{ $umkm->kecamatan }}" required>
                            @error('kecamatan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">Deskripsi Usaha</label>
                            <textarea class="form-control @error('deskripsi_umkm') is-invalid @enderror" placeholder=""
                            name="deskripsi_umkm" id="floatingTextarea" style="height: 200px">{{$umkm->deskripsi_umkm}}</textarea>
                            @error('deskripsi_umkm')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">Foto UMKM</label>
                            <input type="file" id="foto_umkm" class="form-control @error('foto_umkm') is-invalid @enderror" placeholder=""
                            name="foto_umkm"></input>
                            @error('foto_umkm')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        <a href="{{ route('umkm.index') }}" class="btn btn-danger btn-sm btn-block">Kembali</a">
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
