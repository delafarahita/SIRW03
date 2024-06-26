<?php

namespace App\Http\Controllers;

use App\Models\DataKriteriaModel;
use App\Models\DataPenilaianModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataKriteriaController extends Controller
{
    public function index()
    {
        $page = (object) [
            'title' => 'Daftar Kriteria Bantuan Sosial',
        ];

        $activeMenu = 'data_kriteria';
        $dropdown = 'd_bansos';

        return view('admin.data_kriteria.index', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function list(Request $request)
    {
        $kriterias = DataKriteriaModel::select('id_kriteria','kode_kriteria', 'nama_kriteria', 'bobot', 'jenis');

        return DataTables::of($kriterias)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kriteria) {
                $btn = '<a href="' . url('/admin/data_kriteria/' . $kriteria->id_kriteria . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/data_kriteria/' . $kriteria->id_kriteria) . '">'
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

        $activeMenu = 'data_kriteria';
        $dropdown = 'd_bansos';
        $jenis = DataKriteriaModel::$jenis;

        return view('admin.data_kriteria.create', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'jenis' => $jenis
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kriteria' => 'required|unique:data_kriteria',
            'nama_kriteria' => 'required|alpha_spaces',
            'bobot' => 'required|numeric',
            'jenis' => 'required',
        ]);

        DataKriteriaModel::create([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'jenis' => $request->jenis
        ]);

        return redirect('admin/data_kriteria')->with('success', 'Data Kriteria berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $page = (object) [
            'title' => 'Edit Kriteria',
        ];
        $activeMenu = 'bantuan_sosial';
        $dropdown = '';
        $kriteria = DataKriteriaModel::find($id);
        return view('admin.data_kriteria.edit', [
            'page' => $page,
            'kriteria' => $kriteria,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required|alpha_spaces',
            'bobot' => 'required|decimal:2',
            'jenis' => 'required'
        ]);
        $kriteria = DataKriteriaModel::find($id)->update([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'jenis' => $request->jenis,
        ]);
        return redirect('admin/data_kriteria')->with('success', 'Data Kriteria berhasil diupdate!');
    }

    public function destroy($id)
    {
        try {
            $kriteria = DataKriteriaModel::findOrFail($id);
    
            // Periksa apakah ada data penilaian yang terkait dengan kriteria ini
            $penilaianTerkait = DataPenilaianModel::where('id_kriteria', $id)->exists();
    
            if ($penilaianTerkait) {
                return redirect('admin/data_kriteria')->with('warning', 'Data Kriteria tidak dapat dihapus karena masih digunakan pada data penilaian!');
            }
    
            $kriteria->delete();
    
            return redirect('admin/data_kriteria')->with('success', 'Data Kriteria berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('admin/data_kriteria')->with('error', 'Terjadi kesalahan saat menghapus data Kriteria: ' . $e->getMessage());
        }
    }
}
