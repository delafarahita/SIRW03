<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAlternatifModel;
use App\Models\DataPenilaianModel;
use Yajra\DataTables\Facades\DataTables;

class DataAlternatifController extends Controller
{
    public function index()
    {
        $page = (object) [
            'title' => 'Daftar Alternatif Bantuan Sosial',
        ];

        $activeMenu = 'data_alternatif';
        $dropdown = 'd_bansos';

        return view('admin.data_alternatif.index', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function list(Request $request)
    {
        $alternatifs = DataAlternatifModel::select( 'id_alternatif' , 'nama_alternatif');

        return DataTables::of($alternatifs)
            ->addIndexColumn()
            ->addColumn('aksi', function ($alternatif) {
                // $btn = '<a href="' . url('admin/data_alternatif/' . $alternatif->id_alternatif) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn = '<a href="' . url('admin/data_alternatif/' . $alternatif->id_alternatif . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/data_alternatif/' . $alternatif->id_alternatif) . '">'
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
            'title' => 'Tambah Alternatif Baru',
        ];

        $activeMenu = 'data_alternatif';
        $dropdown = 'd_bansos';

        return view('admin.data_alternatif.create', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_alternatif' => 'required',
        ]);

        DataAlternatifModel::create([
            'nama_alternatif' => $request->nama_alternatif
        ]);

        return redirect('admin/data_alternatif')->with('success', 'Data Alternatif berhasil ditambahkan!');
    }

    // public function show($id){
    //     $page = (object) [
    //         'title' => 'Detail Kartu Keluarga',
    //     ];
    //     $activeMenu = 'kartu_keluarga';
    //     $dropdown = 'd_penduduk';
    //     $kk = DataAlternatifModel::find($id);
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
            'title' => 'Edit Data Alternatif',
        ];
        $activeMenu = 'data_alternatif';
        $dropdown = '';
        $alternatif = DataAlternatifModel::find($id);
        return view('admin.data_alternatif.edit', [
            'page' => $page,
            'alternatif' => $alternatif,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_alternatif' => 'required'
        ]);
        $alternatif = DataAlternatifModel::find($id)->update([
            'nama_alternatif' => $request->nama_alternatif
        ]);
        return redirect('admin/data_alternatif')->with('success', 'Data Alternatif berhasil diupdate!');
    }

    public function destroy($id)
    {
        try {
            $alternatif = DataAlternatifModel::findOrFail($id);
    
            // Periksa apakah ada data penilaian yang terkait dengan alternatif ini
            $penilaianTerkait = DataPenilaianModel::where('id_alternatif', $id)->exists();
    
            if ($penilaianTerkait) {
                return redirect('admin/data_alternatif')->with('error', 'Data Alternatif tidak dapat dihapus karena masih digunakan pada data penilaian!');
            }
    
            $alternatif->delete();
    
            return redirect('admin/data_alternatif')->with('success', 'Data Alternatif berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('admin/data_alternatif')->with('error', 'Terjadi kesalahan saat menghapus data alternatif: ' . $e->getMessage());
        }
    }
}
