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
                        @foreach ($alternatif as $alt)
                            <tr>
                                <td>A{{ $alt->id_alternatif }}</td>
                                @foreach ($kriteria as $krit)
                                    @php
                                        $penilaian = $alt->penilaians()->where('id_kriteria', $krit->id_kriteria)->first();
                                        $nilai = $penilaian ? $penilaian->nilai : null;
                                    @endphp
                                    <td>{{ $nilai }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Solusi Rata-rata (AV)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_av">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <th>Nilai</th>
                        </tr>
                        {{-- @foreach ($alternatif as $item)
                        <tr>
                                <td>AV{{$item->id_alternatif}}</td>
                                <td></td>
                        </tr>
                        @endforeach --}}
                    </thead>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Jarak Positif Rata-rata (PDA)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_pda">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($kriteria as $item)
                                <th>{{$item->kode_kriteria}}</th>
                            @endforeach
                            <th>Jumlah Terbobot (SP)</th>
                        </tr>
                        {{-- @foreach ($alternatif as $item)
                        <tr>
                                <td>A{{$item->id_alternatif}}</td>
                        </tr>
                        @endforeach --}}
                    </thead>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Jarak Negatif Rata-rata (NDA)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_nda">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($kriteria as $item)
                                <th>{{$item->kode_kriteria}}</th>
                            @endforeach
                            <th>Jumlah Terbobot (SP)</th>
                        </tr>
                        {{-- @foreach ($alternatif as $item)
                        <tr>
                                <td>A{{$item->id_alternatif}}</td>
                        </tr>
                        @endforeach --}}
                    </thead>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Normalisasi Nilai SP (NSP)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_nda">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($kriteria as $item)
                                <th>{{$item->kode_kriteria}}</th>
                            @endforeach
                        </tr>
                        {{-- @foreach ($alternatif as $item)
                        <tr>
                                <td>A{{$item->id_alternatif}}</td>
                        </tr>
                        @endforeach --}}
                    </thead>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Normalisasi Nilai SN (NSN)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_nda">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($kriteria as $item)
                                <th>{{$item->kode_kriteria}}</th>
                            @endforeach
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="table-container table-responsive">
                <h5>Nilai Skor Penilaian (AS)</h5>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_as">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <th>Nilai</th>
                            <th>Rank</th>
                        </tr>
                    </thead>
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
