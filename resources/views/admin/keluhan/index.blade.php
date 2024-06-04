
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Laporan</h1>
        <div class="row">
            @foreach($keluhans as $keluhan)
                <div class="col-6 mt-3">
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
        </div>
    </div>
@endsection
