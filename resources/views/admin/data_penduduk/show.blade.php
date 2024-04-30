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
                        <div class="col-xs-12 col-sm-12 col-md-12 ml-3 mb-3">
                            <div class="form-group">
                                <label class="control-label">NIK</label>
                                <input type="text" class="form-control" id="" name=""
                                    value=" {{ $penduduk->nik }}" required disabled style="background-color: #f2f2f2; color: #777;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" class="form-control" id="" name=""
                                value=" {{ $penduduk->nama }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $penduduk->tempat_lahir }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input type="datetime-local" class="form-control" id="" name=""
                                value="{{ $penduduk->tanggal_lahir }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gol. Darah</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $penduduk->gol_darah }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $penduduk->jenis_kelamin }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $penduduk->alamat }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">RW</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $penduduk->rw }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">RT</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $penduduk->id_rt }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kel/Desa</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $penduduk->kelurahan }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                    </div>
                    <!-- Kolom bagian kanan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kecamatan</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $penduduk->kecamatan }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $penduduk->kewarganegaraan }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $penduduk->pekerjaan }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $penduduk->agama }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Domisili</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $penduduk->domisili }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-12">
                        <a href="{{ url('DataPenduduk/1/edit/') }}" class="btn btn-primary">Edit</a>
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

    .custom-color-btn {
        background-color: #FFA63E;
        color: #fff;
        border-color: #FFA63E;
    }

</style>
@endpush
@push('js')
@endpush
