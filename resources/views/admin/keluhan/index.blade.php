
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Keluhan</h1>

        <!-- Form untuk menambah keluhan -->
        {{-- <div class="mb-3">
            <h3>Tambah Keluhan</h3>
            <form action="{{ route('keluhan.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Nama Penduduk" name="nama" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Asal RT" name="rt" required>
                    </div>
                    <div class="col-md-4">
                        <textarea class="form-control" rows="1" placeholder="Tulis keluhan..." name="keluhan" required></textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div> --}}

        <!-- Daftar Keluhan -->
        <div class="row">
            @foreach($keluhans as $keluhan)
                <div class="col-md-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $keluhan->nama_penduduk }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Asal RT: {{ $keluhan->rt }}</h6>
                            <p class="card-text">{{ $keluhan->keluhan }}</p>
                            <!-- Tambahkan tombol untuk melihat detail jika diperlukan -->
                            <!-- <a href="{{ route('keluhan.show', $keluhan->id) }}" class="card-link">Lihat Detail</a> -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
