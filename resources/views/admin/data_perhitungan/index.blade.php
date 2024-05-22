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
                <table class="table table-bordered table-striped table-hover table-sm" id="table_matriks">
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
                <h5>Solusi Rata-rata (AV)</h5>
                @php
                    $krit = $dataAvg[0];
                @endphp
                <p>Total Nilai untuk AV{{ $krit['id_kriteria'] }} = {{ $krit['totalNilai'] }}</p>
                <p>Rata-rata Nilai untuk AV{{ $krit['id_kriteria'] }} = {{ $krit['rataRataNilai'] }}</p>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_av">
                    <thead>
                        <tr>
                            <th>Rata-rata Solusi</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataAvg as $krit)
                        <tr>
                            <td>AV{{$krit['id_kriteria']}}</td>
                            <td>{{$krit['rataRataNilai']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Jarak Positif Rata-rata (PDA)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_pda">
                    <thead>
                        <tr>
                            <th>Alternative</th>
                            @foreach($dataPDA[0]['penilaians'] as $penilaian)
                                <th>C{{ $penilaian['id_kriteria'] }}</th>
                            @endforeach
                            {{-- <th>SP</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataPDA as $alternative)
                            <tr>
                                <td>A{{ $alternative['id_alternatif'] }}</td>
                                @foreach($alternative['penilaians'] as $penilaian)
                                    <td>{{ $penilaian['nilai'] !== null ? $penilaian['nilai'] : '-' }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Jumlah Terbobot dari PDA (SP)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_nda">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach($dataSP[0]['penilaians'] as $penilaian)
                                <th>C{{ $penilaian['id_kriteria'] }}</th>
                            @endforeach
                            <th>SP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataSP as $alternative)
                            <tr>
                                <td>A{{ $alternative['id_alternatif'] }}</td>
                                @foreach ($alternative['penilaians'] as $penilaian)
                                    <td>{{ $penilaian['nilai'] }}</td>
                                @endforeach
                                <td>{{ $alternative['sum_weightedValue'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="table-container table-responsive">
                <h5>Jarak Negatif Rata-rata (NDA)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_nda">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach($dataNDA[0]['penilaians'] as $penilaian)
                                <th>C{{ $penilaian['id_kriteria'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataNDA as $alternative)
                            <tr>
                                <td>A{{ $alternative['id_alternatif'] }}</td>
                                @foreach($alternative['penilaians'] as $penilaian)
                                    <td>{{ $penilaian['nilai'] !== null ? $penilaian['nilai'] : '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Jumlah Terbobot dari NDA (SN)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_nda">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach($dataSN[0]['penilaians'] as $penilaian)
                                <th>C{{ $penilaian['id_kriteria'] }}</th>
                            @endforeach
                            <th>SP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataSN as $alternative)
                            <tr>
                                <td>A{{ $alternative['id_alternatif'] }}</td>
                                @foreach ($alternative['penilaians'] as $penilaian)
                                    <td>{{ $penilaian['nilai'] }}</td>
                                @endforeach
                                <td>{{ $alternative['sum_weightedValue'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Normalisasi Nilai SP (NSP) & Normalisasi Nilai SN (NSN)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_nda">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <th>NSP</th>
                            {{-- <th>NSN</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataNSP as $alternative)
                            <tr>
                                <td>A{{ $alternative['id_alternatif'] }}</td>
                                <td>{{ $alternative['sum_NSP'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Normalisasi Nilai SN (NSN)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_nda">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <th>NSN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataNSN as $alternative)
                            <tr>
                                <td>A{{ $alternative['id_alternatif'] }}</td>
                                <td>{{ $alternative['sum_NSN'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Nilai Skor Penilaian (AS)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_as">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <th>Nilai</th>
                            {{-- <th>Rank</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataAS as $alternative)
                            <tr>
                                <td>A{{ $alternative['id_alternatif'] }}</td>
                                <td>{{ $alternative['combined_value'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Nilai Perankingan (Rank)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_as">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Alternatif</th>
                            <th>Nama Penerima</th>
                            {{-- <th>Rank</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataRank as $alternative)
                            <tr>
                                <td>{{ $alternative['rank'] }}</td>
                                <td>A{{ $alternative['id_alternatif'] }}</td>
                                <td>{{$alternative['nama_alternatif']}}</td>
                                {{-- <td>{{ $alternative['combined_value'] }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var dataMatriks = $('#table_matrik').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/data_perhitungan/list') }}",
                    dataType: "json",
                    type: "POST",
                },
                columns: [{
                    data: "id_alternatif",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "nilai",
                    orderable: false,
                    searchable: false
                }]
            });
        })
    </script>
@endpush
