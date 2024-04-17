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
                                value="10203040506070809" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" class="form-control" id="" name=""
                                value="Anto" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="" name=""
                                value="Malang" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input type="datetime-local" class="form-control" id="" name=""
                                value="2001-01-01T00:00" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gol. Darah</label>
                            <input type="text" class="form-control" id="" name=""
                                value="A" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin</label>
                            <select class="form-control" id="" name="" required disabled style="background-color: #f2f2f2; color: #777;">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">RT</label>
                            <input type="text" class="form-control" id="" name=""
                                value="09" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">RW</label>
                            <input type="text" class="form-control" id="" name=""
                                value="03" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kel/Desa</label>
                            <input type="text" class="form-control" id="" name=""
                                value="Mergosono" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kecamatan</label>
                            <input type="text" class="form-control" id="" name=""
                                value="Kedungkandang" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                    </div>
                    <!-- Kolom bagian kanan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <select class="form-control" id="" name="" required disabled style="background-color: #f2f2f2; color: #777;">
                                <option value="ISLAM">Islam</option>
                                <!-- tambahkan pilihan agama lainnya -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Perkawinan</label>
                            <select class="form-control" id="" name="" required disabled style="background-color: #f2f2f2; color: #777;">
                                <option value="BELUM KAWIN">Belum Kawin</option>
                                <!-- tambahkan pilihan status perkawinan lainnya -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>
                            <select class="form-control" id="" name="" required disabled style="background-color: #f2f2f2; color: #777;">
                                <option value="PELAJAR/MAHASISWA">Pelajar/Mahasiswa</option>
                                <!-- tambahkan pilihan pekerjaan lainnya -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan</label>
                            <select class="form-control" id="" name="" required disabled style="background-color: #f2f2f2; color: #777;">
                                <option value="WNI">WNI</option>
                                <!-- tambahkan pilihan kewarganegaraan lainnya -->
                            </select>
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
