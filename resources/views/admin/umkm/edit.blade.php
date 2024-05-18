@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('umkm.edit') }}" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">NIK</label>
                            <input type="number" class="form-control" id="nik" name="nik">
                                {{-- value="{{ $umkm->nik }}" > --}}
                            @error('nik')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">No. KK</label>
                            {{-- <input type="number" class="form-control" id="no_kk" name="no_kk"
                                value="{{ old('no_kk') }}" required> --}}
                            <select class="form-control" id="no_kk" name="no_kk">
                                <option value="">- Pilih  -</option>
                                {{-- @foreach ($kk as $item)
                                    <option value="{{ $item->no_kk }}"
                                        @if ($item->no_kk == $umkm->no_kk) selected @endif>{{ $item->no_kk }}</option>
                                @endforeach --}}
                            </select>
                            @error('no_kk')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                                {{-- value="{{ $umkm->nama }}" required> --}}
                            @error('nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                {{-- value="{{ $umkm->tempat_lahir }}" required> --}}
                            @error('tempat_lahir')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                {{-- value="{{ $umkm->tanggal_lahir }}" required> --}}
                            @error('tanggal_lahir')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gol. Darah</label>
                            <select class="form-control" id="gol_darah" name="gol_darah" required>
                                <option value="">- PILIH -</option>
                                {{-- @foreach ($gol_darah as $item)
                                    <option value="{{ $item }}" @if ($item == $umkm->gol_darah) selected @endif>
                                        {{ $item }}</option>
                                @endforeach --}}
                            </select>
                            @error('gol_darah')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">- PILIH -</option>
                                {{-- @foreach ($jenis_kelamin as $item)
                                    <option value="{{ $item }}" @if ($item == $umkm->jenis_kelamin) selected @endif>
                                        {{ $item }}</option>
                                @endforeach --}}
                            </select>
                            @error('jenis_kelamin')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                                {{-- value="{{ $umkm->alamat }}" required> --}}
                            @error('alamat')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">RW</label>
                            <input type="number" class="form-control" id="rw" name="rw">
                                {{-- value="{{ $umkm->rw }}" required> --}}
                            @error('rw')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">RT</label>
                            <select class="form-control" name="id_rt" id="id_rt" required>
                                <option value="">- Pilih</option>
                                {{-- @foreach ($rt as $item)
                                    <option value="{{ $item->id_rt }}" @if($item->id_rt == $umkm->id_rt) selected @endif>{{ $item->id_rt }}</option>
                                @endforeach --}}
                            </select>
                            @error('id_rt')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kel/Desa</label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan">
                                {{-- value="{{ $umkm->kelurahan }}" required> --}}
                            @error('kelurahan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                                {{-- value="{{ $umkm->kecamatan }}" required> --}}
                            @error('kecamatan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan</label>
                            <select class="form-control" id="kewarganegaraan" name="kewarganegaraan" required>
                                <option value="">- PILIH -</option>
                                {{-- @foreach ($kewarganegaraan as $item)
                                    <option value="{{ $item }}" @if ($item == $umkm->kewarganegaraan) selected @endif>{{$item}}</option>
                                @endforeach --}}
                            </select>
                            @error('kewarganegaraan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>
                            <select class="form-control" id="pekerjaan" name="pekerjaan" required>
                                <option value="">- PILIH -</option>
                                {{-- @foreach ($pekerjaan as $item)
                                    <option value="{{ $item }}" @if ($item == $umkm->pekerjaan) selected @endif>{{ $item }}</option>
                                @endforeach --}}
                            </select>
                            @error('pekerjaan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <select class="form-control" id="agama" name="agama" required>
                                <option value="">- PILIH -</option>
                                {{-- @foreach ($agama as $item)
                                    <option value="{{ $item }}" @if ($item == $umkm->agama) selected @endif>{{$item}}</option>
                                @endforeach --}}
                            </select>
                            @error('agama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Domisili</label>
                            <select class="form-control" id="domisili" name="domisili" required>
                                <option value="">- PILIH -</option>
                                {{-- @foreach ($domisili as $item)
                                    <option value="{{ $item }}" @if ($item == $umkm->domisili) selected @endif>{{$item}}</option>
                                @endforeach --}}
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
