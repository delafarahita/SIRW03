@extends('layouts.app')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('kas.update', $kas->id) }}" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">RT</label>
                            <select class="form-control" name="id_rt" id="id_rt" required>
                                <option value="">- PILIH -</option>
                                @foreach ($rt as $item)
                                    <option value="{{ $item->id_rt }}" @if($item->id_rt == $kas->id_rt) selected @endif>{{ $item->id_rt }}</option>
                                @endforeach
                            </select>
                            @error('id_rt')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                value="{{ $kas->keterangan }}" required>
                            @error('keterangan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="{{ $kas->tanggal }}" required>
                            @error('tanggal')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pemasukan</label>
                            <input type="number" class="form-control" id="pemasukan" name="pemasukan"
                                value="{{ $kas->pemasukan }}" required>
                            @error('pemasukan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pengeluaran</label>
                            <input type="number" class="form-control" id="pengeluaran" name="pengeluaran"
                                value="{{ $kas->pengeluaran }}" required>
                            @error('pengeluaran')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        <a href="{{ route('kas.index') }}" class="btn btn-danger btn-sm btn-block">Kembali</a>
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
