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
            @if (isset($warning))
                <div class="alert alert-warning">
                    {{ $warning }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-container table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_dataPenilaian">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Alternatif</th>
                            <th>Aksi</th>
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
            var dataPenilaian = $('#table_dataPenilaian').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/data_penilaian/list') }}",
                    dataType: "json",
                    type: "POST",
                },
                columns: [{
                    data: "DT_RowIndex",
                    class: 'text-center',
                    orderable: false,
                    searchable: false
                }, {
                    data: "nama_alternatif",
                    orderable: true,
                    searchable: true
                    // render: function(data, type, row) {
                    //     if (type === 'display' && uniqueAlternatifNames.includes(data)) {
                    //         return '';
                    //     }
                    //     uniqueAlternatifNames.push(data);
                    //     return data;
                    // }
                }, {
                    data: "aksi",
                    orderable: false,
                    searchable: false
                }]
            });
        });
    </script>
@endpush
