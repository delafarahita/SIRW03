{{-- @extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('umkm') }}" class="form-horizontal">
                @csrf
                <div class="row">
                    <!-- Kolom bagian kiri -->
                    <div class="col-md-6">
                        <div class="col-xs-12 col-sm-12 col-md-12 ml-3 mb-3">
                            <div class="form-group">
                                <label class="control-label">Nama Usaha</label>
                                <input type="text" class="form-control" id="" name=""
                                    value=" {{ $umkm->nama_usaha }}" required disabled style="background-color: #f2f2f2; color: #777;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Pemilik Usaha</label>
                            <input type="text" class="form-control" id="" name=""
                                value=" {{ $umkm->nama_pemilik_usaha }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat Usaha</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $umkm->alamat_usaha }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">RT</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $umkm->id_rt }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">RW</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $umkm->rw }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kel/Desa</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $umkm->kelurahan }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                    </div>
                    <!-- Kolom bagian kanan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Deskripsi Usaha</label>
                            <input type="text" class="form-control" id="" name=""
                                value="{{ $umkm->deskripsi_usaha }}" required disabled style="background-color: #f2f2f2; color: #777;">
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-12">
                        <a href="{{ url('umkm/1/edit/') }}" class="btn btn-primary">Edit</a>
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
@endpush --}}
