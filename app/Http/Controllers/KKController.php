<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KKModel;
use Yajra\DataTables\Facades\DataTables;

class KKController extends Controller
{
    public function index()
    {
        $page = (object) [
            'title' => 'Daftar Kartu Keluarga',
        ];

        $activeMenu = 'kk';
        $dropdown = 'd_penduduk';

        return view('admin.kk.index', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function list(Request $request)
    {
        $kks = KKModel::select('no_kk', 'kepala_keluarga');

        return DataTables::of($kks)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kk) {
                $btn = '<a href="' . url('admin/data_kk/' . $kk->no_kk . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/data_kk/' . $kk->no_kk) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $page = (object) [
            'title' => 'Tambah Kartu Keluarga Baru',
        ];

        $activeMenu = 'kk';
        $dropdown = 'd_penduduk';

        return view('admin.kk.create', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_kk' => 'required|unique:kk',
            'kepala_keluarga' => 'required|string',
        ]);

        KKModel::create([
            'no_kk' => $request->no_kk,
            'kepala_keluarga' => $request->kepala_keluarga,
        ]);

        return redirect('admin/data_kk')->with('success', 'Data Kartu Keluarga berhasil ditambahkan!');
    }

    // public function show($id){
    //     $page = (object) [
    //         'title' => 'Detail Kartu Keluarga',
    //     ];
    //     $activeMenu = 'kartu_keluarga';
    //     $dropdown = 'd_penduduk';
    //     $kk = KKModel::find($id);
    //     return view('admin.kk.show', [
    //         'page' => $page,
    //         'kk' => $kk,
    //         'activeMenu' => $activeMenu,
    //         'dropdown' => $dropdown
    //     ]);
    // }

    public function edit($id)
    {
        $page = (object) [
            'title' => 'Edit Kartu Keluarga',
        ];
        $activeMenu = 'kk';
        $dropdown = 'd_penduduk';
        $kk = KKModel::find($id);
        return view('admin.kk.edit', [
            'page' => $page,
            'kk' => $kk,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_kk' => 'required',
            'kepala_keluarga' => 'required',
        ]);
        $kk = KKModel::find($id)->update([
            'no_kk' => $request->no_kk,
            'kepala_keluarga' => $request->kepala_keluarga,
        ]);
        return redirect('admin/data_kk')->with('success', 'Data Kartu Keluarga berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kk = KKModel::find($id);
        $kk->delete();
        return redirect('admin/data_kk')->with('success', 'Data Kartu Keluarga berhasil dihapus!');
    }
}
