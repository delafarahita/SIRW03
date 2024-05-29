@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Inventaris</div>

        <div class="card-body">
            <form method="POST" action="{{ url('admin/inventaris/' . $inventaris->inventaris_id) }}">

                @csrf
                {!! method_field('PUT') !!}

                <div class="form-group row">
                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <input type="text" class="form-control col-sm-10" id="nama_barang" name="nama_barang"
                        value="{{ $inventaris->nama_barang }}">
                    @error('nama_barang')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="jenis_barang" class="col-sm-2 col-form-label">Jenis Barang</label>
                    <input type="text" class="form-control col-sm-10" id="jenis_barang" name="jenis_barang"
                        value="{{ $inventaris->jenis_barang }}">
                    @error('jenis_barang')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="form-group row">
                    <label for="jumlah_barang" class="col-sm-2 col-form-label">Jumlah Barang</label>
                    <input type="text" class="form-control col-sm-10" id="jumlah_barang" name="jumlah_barang"
                        value="{{ $inventaris->jumlah_barang }}">
                    @error('jumlah_barang')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div> --}}

                <div class="form-group row">
                    <label for="status_barang" class="col-sm-2 col-form-label">Status Barang</label>
                    <select class="form-control col-sm-10" id="status_barang" name="status_barang">
                        <option value="Tersedia" {{ $inventaris->status_barang == 'Tersedia' ? 'selected' : '' }}>Tersedia
                        </option>
                        <option value="Dipinjam" {{ $inventaris->status_barang == 'Dipinjam' ? 'selected' : '' }}>Dipinjam
                        </option>
                    </select>
                    @error('status_barang')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label></label>
                    <div class="pt-2">
                        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-primary" href="{{ route('inventaris.index') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
