@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('data_penduduk.store') }}" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">NIK<small class="text-danger">*</small></label>
                            <input type="number" class="form-control" id="nik" name="nik"
                                value="{{ old('nik') }}" required>
                            @error('nik')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text text-muted">16 angka pada KTP</small>
                        </div>
                        <div class="form-group">
                            <label class="control-label">No. KK<small class="text-danger">*</small></label>
                            <select class="form-control" id="no_kk" name="no_kk" required>
                                <option value="{{ old('no_kk') }}">- PILIH -</option>
                                @foreach ($kk as $item)
                                    <option value="{{ $item->no_kk }}" {{ old('no_kk') == $item->no_kk ? 'selected' : '' }}>{{ $item->no_kk }}</option>
                                @endforeach
                            </select>
                            @error('no_kk')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama<small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama') }}" required>
                            @error('nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat Lahir<small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="{{ old('tempat_lahir') }}" required>
                            @error('tempat_lahir')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir<small class="text-danger">*</small></label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}" required>
                            @error('tanggal_lahir')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gol. Darah<small class="text-danger">*</small></label>
                            <select class="form-control" id="gol_darah" name="gol_darah" required>
                                <option value="">- PILIH -</option>
                                @foreach ($gol_darah as $item)
                                    <option value="{{ $item }}" {{ old('gol_darah') == $item ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('gol_darah')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin<small class="text-danger">*</small></label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">- PILIH -</option>
                                @foreach ($jenis_kelamin as $item)
                                    <option value="{{ $item }}" {{ old('jenis_kelamin') == $item ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('jenis_kelamin')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat<small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ old('alamat') }}" required>
                            @error('alamat')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">RW<small class="text-danger">*</small></label>
                            <input type="number" class="form-control" id="rw" name="rw"
                                value="3" required>
                            @error('rw')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">RT<small class="text-danger">*</small></label>
                            <select class="form-control" name="id_rt" id="id_rt" required>
                                <option value="">- Pilih -</option>
                                @foreach ($rt as $item)
                                    <option value="{{ $item->id_rt }}"  {{ old('id_rt') == $item->id_rt ? 'selected' : '' }}>{{ $item->id_rt }}</option>
                                @endforeach
                            </select>
                            @error('id_rt')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Perkawinan<small class="text-danger">*</small></label>
                            <select class="form-control" name="status_perkawinan" id="status_perkawinan" required>
                                <option value="">- Pilih -</option>
                                @foreach ($status_perkawinan as $item)
                                    <option value="{{ $item }}" {{ old('status_perkawinan') == $item ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('status_perkawinan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kel/Desa<small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                                value="{{ old('kelurahan') }}" required>
                            @error('kelurahan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kecamatan<small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                value="{{ old('kecamatan') }}" required>
                            @error('kecamatan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan<small class="text-danger">*</small></label>
                            <select class="form-control" id="kewarganegaraan" name="kewarganegaraan" required>
                                <option value="{{ old('kewarganegaraan') }}">- PILIH -</option>
                                @foreach ($kewarganegaraan as $item)
                                    <option value="{{ $item }}" {{ old('kewarganegaraan') == $item ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('kewarganegaraan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan<small class="text-danger">*</small></label>
                            <select class="form-control" id="pekerjaan" name="pekerjaan" required>
                                <option value="{{ old('pekerjaan') }}">- PILIH -</option>
                                @foreach ($pekerjaan as $item)
                                    <option value="{{ $item }}" {{ old('pekerjaan') == $item ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('pekerjaan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label">Agama<small class="text-danger">*</small></label>
                            <select class="form-control" id="agama" name="agama" required>
                                <option value="">- PILIH -</option>
                                @foreach ($agama as $item)
                                    <option value="{{ $item }} " {{ old('agama') == $item ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('agama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Domisili<small class="text-danger">*</small></label>
                            <select class="form-control" id="domisili" name="domisili" required>
                                <option value="">- PILIH -</option>
                                @foreach ($domisili as $item)
                                    <option value="{{ $item }}" {{ old('domisili') == $item ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('domisili')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        <a href="{{ route('data_penduduk.index') }}" class="btn btn-danger btn-sm btn-block">Kembali</a">
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
