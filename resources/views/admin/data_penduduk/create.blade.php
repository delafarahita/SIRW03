@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('dataPenduduk') }}" class="form-horizontal">
                @csrf
                <div class="row">
                    <!-- Kolom bagian kiri -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">NIK</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ old('') }}" required>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ old('') }}" required>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ old('') }}" required>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input type="datetime-local" class="form-control" id="" name=""
                                value="{{ old('') }}" required>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gol. Darah</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ old('') }}" required>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin</label>
                            <select class="form-control" id="" name="" required>
                                <option value="">- PEREMPUAN -</option>
                                {{-- @foreach ()
                                    <option value="{{ $item-> }}">{{ $item-> }}</option>
                                @endforeach --}}
                            </select>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">RT</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ old('') }}" required>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">RW</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ old('') }}" required>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kel/Desa</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ old('') }}" required>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kecamatan</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ old('') }}" required>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- Kolom bagian kanan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <select class="form-control" id="" name="" required>
                                <option value="">- ISLAM -</option>
                                {{-- @foreach ()
                                    <option value="{{ $item-> }}">{{ $item-> }}</option>
                                @endforeach --}}
                            </select>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Perkawinan</label>
                            <select class="form-control" id="" name="" required>
                                <option value="">- BELUM KAWIN -</option>
                                {{-- @foreach ()
                                    <option value="{{ $item-> }}">{{ $item-> }}</option>
                                @endforeach --}}
                            </select>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>
                            <select class="form-control" id="" name="" required>
                                <option value="">- PELAJAR/MAHASISWA -</option>
                                {{-- @foreach ()
                                    <option value="{{ $item-> }}">{{ $item-> }}</option>
                                @endforeach --}}
                            </select>
                            @error('')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan</label>
                            <select class="form-control" id="" name="" required>
                                <option value="">- WNI -</option>
                                {{-- @foreach ()
                                    <option value="{{ $item-> }}">{{ $item-> }}</option>
                                @endforeach --}}
                            </select>
                            @error('')
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
