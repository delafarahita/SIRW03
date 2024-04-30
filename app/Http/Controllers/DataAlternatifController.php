<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAlternatifModel;
use Yajra\DataTables\Facades\DataTables;

class DataAlternatifController extends Controller
{
    public function index()
    {
        $page = (object) [
            'title' => 'Daftar Kriteria Bantuan Sosial',
        ];

        $activeMenu = 'bantuan_sosial';
        $dropdown = '';

        return view('admin.bantuan_sosial.index', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function list(Request $request)
    {
        $kriterias = DataAlternatifModel::select('no_kk', 'kepala_keluarga');

        return DataTables::of($kriterias)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kriteria) {
                $btn = '<a href="' . url('admin/data_kk/' . $kriteria->no_kk) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('admin/data_kk/' . $kriteria->no_kk . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/data_kk/' . $kriteria->no_kk) . '">'
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
            'title' => 'Tambah Kriteria Baru',
        ];

        $activeMenu = 'bantuan_sosial';
        $dropdown = '';

        return view('admin.bantuan_sosial.create', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_kk' => 'required|unique:kk',
            'kepala_keluarga' => 'required',
        ]);

        DataAlternatifModel::create([
            'no_kk' => $request->no_kk,
            'kepala_keluarga' => $request->kepala_keluarga,
        ]);

        return redirect('admin/data_kk')->with('success', 'Data Kartu Keluarga berhasil ditambahkan!');
    }

    public function show($id){
        $page = (object) [
            'title' => 'Detail Kartu Keluarga',
        ];
        $activeMenu = 'kartu_keluarga';
        $dropdown = 'd_penduduk';
        $kk = DataAlternatifModel::find($id);
        return view('admin.kk.show', [
            'page' => $page,
            'kk' => $kk,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function edit($id)
    {
        $page = (object) [
            'title' => 'Edit Kartu Keluarga',
        ];
        $activeMenu = 'kartu_keluarga';
        $dropdown = 'd_penduduk';
        $kk = DataAlternatifModel::find($id);
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
        $kk = DataAlternatifModel::find($id)->update([
            'no_kk' => $request->no_kk,
            'kepala_keluarga' => $request->kepala_keluarga,
        ]);
        return redirect('admin/data_kk')->with('success', 'Data Kartu Keluarga berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kk = DataAlternatifModel::find($id);
        $kk->delete();
        return redirect('admin/data_kk')->with('success', 'Data Kartu Keluarga berhasil dihapus!');
    }
}
