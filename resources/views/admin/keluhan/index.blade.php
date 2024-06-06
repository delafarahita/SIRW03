
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Laporan</h1>
        <div class="row">
            @foreach($keluhans as $keluhan)
                <div class="col-6 mt-3 mb-1">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $keluhan->nama_penduduk }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Asal RT: {{ $keluhan->rt }}</h6>
                            <p class="card-text">{{ $keluhan->keluhan }}</p>
                            <P class="card-text">{{ $keluhan->created_at }}</P>
                            @if ($keluhan->foto)
                                <img style="width: 200px; height:200px" src="{{asset('storage/img_keluhan/' . $keluhan->foto)}}" alt="{{$keluhan->keluhan}}">
                            @endif
                            <!-- <a href="{{ route('keluhan.show', $keluhan->id) }}" class="card-link">Lihat Detail</a> -->
                        </div>
                    </div>
                </div>
            @endforeach
            <nav aria-label="Page navigation example">
                <ul class="pagination d-flex justify-content-center">
                  {{-- Previous Page Link --}}
                  @if ($keluhans->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                  @else
                    <li class="page-item"><a class="page-link" href="{{ $keluhans->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                  @endif

                  {{-- Pagination Elements --}}
                  @foreach ($keluhans->getUrlRange(1, $keluhans->lastPage()) as $pagination => $url)
                    @if ($pagination == $keluhans->currentPage())
                      <li class="page-item active"><span class="page-link">{{ $pagination }}</span></li>
                    @else
                      <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $pagination }}</a></li>
                    @endif
                  @endforeach

                  {{-- Next Page Link --}}
                  @if ($keluhans->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $kategoriDagang->nextPageUrl() }}" rel="next">&raquo;</a></li>
                  @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                  @endif
                </ul>
              </nav>
        </div>
    </div>
@endsection
