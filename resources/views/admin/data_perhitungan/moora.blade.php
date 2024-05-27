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
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-success">{{ session('error') }}</div>
            @endif

            <div class="table-container table-responsive">
                <h5>Matriks Keputusan (X)</h5>
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($kriteria as $item)
                                <th>{{ $item->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataMatriks as $alt)
                            <tr>
                                <td>A{{ $alt['id_alternatif'] }}</td>
                                @foreach ($alt['penilaians'] as $penilaian)
                                    <td>{{ $penilaian['nilai'] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-container table-responsive">
                <h5>Matriks Normalisasi (R)</h5>
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($kriteria as $item)
                                <th>{{ $item->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($normalizationMatrix as $alt)
                            <tr>
                                <td>A{{ $alt['id_alternatif'] }}</td>
                                @foreach ($alt['penilaians'] as $penilaian)
                                    <td>{{ round($penilaian['nilai'], 4) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-container table-responsive">
                <h5>Matriks Ternormalisasi Terbobot (Y)</h5>
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($kriteria as $item)
                                <th>{{ $item->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($weightedMatrix as $alt)
                            <tr>
                                <td>A{{ $alt['id_alternatif'] }}</td>
                                @foreach ($alt['penilaians'] as $penilaian)
                                    <td>{{ round($penilaian['nilai'], 4) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-container table-responsive">
                <h5>Matriks Optimalisasi (D)</h5>
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <th>Optimalisasi Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($optimizationMatrix as $alt)
                            <tr>
                                <td>A{{ $alt['id_alternatif'] }}</td>
                                <td>{{ round($alt['optimization_value'], 4) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-container table-responsive">
                <h5>Ranking Alternatif</h5>
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Alternatif</th>
                            <th>Nama Penerima</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataRank as $alt)
                            <tr>
                                <td>{{ $alt['rank'] }}</td>
                                <td>A{{ $alt['id_alternatif'] }}</td>
                                <td>{{ $alt['nama_alternatif'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
