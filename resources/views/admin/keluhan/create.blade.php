@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Form Keluhan</h1>
        <form action="{{ route('keluhan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama">Nama Penduduk</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="rt">Asal RT</label>
                <input type="text" class="form-control" id="rt" name="rt" required>
            </div>

            <div class="mb-3">
                <label for="keluhan">Keluhan</label>
                <textarea class="form-control" id="keluhan" name="keluhan" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
@endsection
