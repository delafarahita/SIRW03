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

        .img-uniform {
            width: 100%;
            height: auto;
            max-width: 300px;
            max-height: 200px;
            object-fit: cover;
        }

    </style>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn-sm custom-color-btn mt-1" href="{{ url('admin/kegiatan/create') }}">Tambah</a>
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
                @foreach ($kegiatan as $item)
                    <div class="col-md-6">
                        <div class="card rounded-3 text-white" style="background-color: #1F2937;">
                            @if ($item->image_path)
                                <img src="{{ asset('storage/image_path/' . $item->image_path) }}" class="card-img-top rounded-3 img-uniform img-fluid"
                                    alt="{{ $item->nama }}">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text">Jenis Kegiatan: {{ $item->jenis }}</p>
                                <p class="card-text">Tanggal Pelaksanaan: {{ $item->tanggal }}</p>
                                <p class="card-text">Deskripsi: {{ $item->deskripsi }}</p>
                                <p class="card-text">Alamat: {{ $item->alamat }}</p>
                                <div class="d-flex justify-content-between mt-5">
                                    <div>
                                        <a href="{{ url('/admin/kegiatan/' . $item->id . '/edit') }}" class="btn btn-warning">Edit</a>
                                    </div>
                                    <div>
                                        <form class="d-inline-block" method="POST" action="{{ url('/admin/kegiatan/' . $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <nav aria-label="Page navigation example ">
                    <ul class="pagination d-flex justify-content-center">
                      {{-- Previous Page Link --}}
                      @if ($kegiatan->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                      @else
                        <li class="page-item"><a class="page-link" href="{{ $kegiatan->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                      @endif

                      {{-- Pagination Elements --}}
                      @foreach ($kegiatan->getUrlRange(1, $kegiatan->lastPage()) as $pagination => $url)
                        @if ($pagination == $kegiatan->currentPage())
                          <li class="page-item active"><span class="page-link">{{ $pagination }}</span></li>
                        @else
                          <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $pagination }}</a></li>
                        @endif
                      @endforeach

                      {{-- Next Page Link --}}
                      @if ($kegiatan->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $kegiatan->nextPageUrl() }}" rel="next">&raquo;</a></li>
                      @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                      @endif
                    </ul>
                  </nav>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@endpush
