@extends('layouts.app')
@section('content')
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">{{ $page->title }}</h3>
      <div class="card-tools">
        {{-- <a class="btn btn-sm btn-primary mt-1" href="{{ url('DataPenduduk/create') }}">Tambah</a> --}}
      </div>
    </div>
    <div class="card-body">
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <!-- Dua kotak -->
      <div class="d-flex justify-content-between">
        <div class="card rounded-3 text-white mx-2" style="width: 40.5rem; background-color: #1F2937;">
            <img src="{{asset('assets/img/dagang_4.jpg')}}" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Kategori Dagang</h5>
              <div class="d-flex justify-content-between mt-2">
              </div>
            </div>
        </div>

        <div class="card rounded-3 text-white" style="width: 40.5rem; background-color: #1F2937;">
            <img src="{{asset('assets/img/jasa_2.jpg')}}" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Kategori Jasa</h5>
              <div class="d-flex justify-content-between mt-2">
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
