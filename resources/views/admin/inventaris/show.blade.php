@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('inventaris') }}" class="form-horizontal">
                @csrf

                <div class="col-xs-12 col-sm-12 col-md-12 ml-3 mb-3">
                    <div class="form-group">
                        <label class="control-label">Nama Barang</label>
                        <input type="text" class="form-control" id="" name=""
                            value=" {{ $inventaris->nama_barang }}" required disabled
                            style="background-color: #f2f2f2; color: #777;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Jenis Barang</label>
                    <input type="text" class="form-control" id="" name=""
                        value="{{ $inventaris->jenis_barang }}" required disabled
                        style="background-color: #f2f2f2; color: #777;">
                </div>

                <div class="form-group">
                    <label class="control-label">Jumlah Barang</label>
                    <input type="text" class="form-control" id="" name=""
                        value="{{ $inventaris->jumlah_barang }}" required disabled
                        style="background-color: #f2f2f2; color: #777;">
                </div>

                <div class="form-group row mt-3">
                    <div class="col-12">
                        <a href="{{ url('admin/inventaris/' . $inventaris->id_inventaris . '/edit') }}"
                            class="btn btn-primary">Edit</a>
                        <a href="{{ url('admin/inventaris') }}" class="btn btn-secondary">Kembali</a>
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
