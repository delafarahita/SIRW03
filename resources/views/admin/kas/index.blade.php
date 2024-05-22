@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Data Transaksi</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pemasukan</th>
                    <th>Tanggal Pengeluaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kas as $key => $kas)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $kas->tanggal_pemasukan }}</td>
                        <td>{{ $kas->tanggal_pengeluaran }}</td>
                        <td>
                            <a href="{{ route('kas.edit', $kas->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('kas.destroy', $kas->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            <a href="{{ route('kas.show', $kas->id) }}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
