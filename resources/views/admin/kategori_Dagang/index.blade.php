@extends('layouts.app')
@section('content')
<style>
    .custom-color-btn {
        background-color: #FFA63E;
        color: #fff;
        border-color: #FFA63E;
    }

    .table-container {
        margin-bottom: 20px;
    }
</style>
    <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">{{ $page->title }}</h3>
      <div class="card-tools">
        <a class="btn-sm custom-color-btn mt-1" href="{{ route('umkm.create') }}">Tambah</a>
      </div>
    </div>
    <div class="card-body">
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

    <div class="row g-3">
        @foreach ($kategori as $item)
            <div class="col-md-6">
                <div class="card rounded-3 text-white" style="background-color: #1F2937;">
                    @if ($item->image_path)
                        <img src="{{ asset($item->image_path) }}" class="card-img-top rounded-3 img-fluid" alt="{{ $item->nama }}">
                    @endif
                </div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->nama_umkm }}</h5>
                      <p class="card-text">{{ $item->deskripsi_umkm }}</p>
                      <p class="card-text">Kategori: {{ $item->kategori_umkm }}</p>
                      <p class="card-text">Nama Pemilik: {{ $item->pemilik_umkm }}</p>
                      <p class="card-text">Alamat: {{ $item->alamat_umkm }}</p>
                      <p class="card-text">RT: {{ $item->id_rt }}</p>
                      <p class="card-text">RW: {{ $item->rw }}</p>
                      <p class="card-text">Kelurahan: {{ $item->kelurahan }}</p>
                      <p class="card-text">Kecamatan: {{ $item->kecamatan }}</p>
                      <div class="d-flex justify-content-between mt-5">
                        <a href="{{ url('admin/umkm/' . 5 . '/delete') }}" class="btn btn-danger">Hapus</a>
                        <a href="{{ url('admin/umkm/' . 5 . '/edit') }}" class="btn btn-warning">Edit</a>
                      </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    </div>
@endsection

@push('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endpush

@push('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endpush
