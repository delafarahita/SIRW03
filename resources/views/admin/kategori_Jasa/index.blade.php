@extends('layouts.app')

@section('content')
<style>
    .custom-color-btn {
        background-color: #FFA63E;
        color: #fff;
        border-color: #FFA63E;
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

        <!-- Tiga kotak -->
        <div class="d-flex justify-content-between">
            <div class="card rounded-3 text-white mx-2" style="width: 31.5rem; background-color: #1F2937;">
                <img src="{{ asset('assets/img/jasa_1.jpg') }}" class="card-img-top">
                <div class="card-body d-flex flex-column justify-content-between align-items-start">
                    <div style="text-align: left; width: 100%;">
                        <h5 class="card-title">Laundry Binatu</h5>
                        <h5 class="card-title">All Clean - Dry Cleaning</h5>
                        <p class="card-text">Harga: 5.000 - 200.000</p>
                        <p class="card-text">Alamat: JL.Mergosono Gg.V</p>
                    </div>
                    <div class="d-flex justify-content-between mt-5 w-100">
                        <a href="#" class="btn btn-danger">Hapus</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>

            <div class="card rounded-3 text-white mx-2" style="width: 31.5rem; background-color: #1F2937;">
                <img src="{{ asset('assets/img/jasa_2.jpg') }}" class="card-img-top">
                <div class="card-body d-flex flex-column justify-content-between align-items-start">
                    <div style="text-align: left; width: 100%;">
                        <h5 class="card-title">Toko Bintang</h5>
                        <h5 class="card-title">Fotocopy, Print, Percetakan</h5>
                        <p class="card-text">Harga: 500 - 500.000</p>
                        <p class="card-text">Alamat: JL.Mergosono Gg.V</p>
                    </div>
                    <div class="d-flex justify-content-between mt-5 w-100">
                        <a href="#" class="btn btn-danger">Hapus</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>

            <div class="card rounded-3 text-white mx-2" style="width: 31.5rem; background-color: #1F2937;">
                <img src="{{ asset('assets/img/jasa_4.jpg') }}" class="card-img-top">
                <div class="card-body d-flex flex-column justify-content-between align-items-start">
                    <div style="text-align: left; width: 100%;">
                        <h5 class="card-title">Salon Narmi's</h5>
                        <p class="card-text">Harga: 10.00 - 300.000</p>
                        <p class="card-text">Alamat: JL.Kolonel Sugiono V/68 Malang</p>
                    </div>
                    <div class="d-flex justify-content-between mt-5 w-100">
                        <a href="#" class="btn btn-danger">Hapus</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
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
