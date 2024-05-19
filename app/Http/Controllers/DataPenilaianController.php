<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatifModel;
use App\Models\DataKriteriaModel;
use Illuminate\Http\Request;
use App\Models\DataPenilaianModel;
use Yajra\DataTables\Facades\DataTables;

class DataPenilaianController extends Controller
{
    public function index() {
        $page = (object) [
            'title' => 'Daftar Penilaian Bantuan Sosial',
        ];

        $activeMenu = 'data_penilaian';
        $dropdown = 'd_bansos';

        return view('admin.data_penilaian.index', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function list(Request $request)
    {
        $alternatifs = DataAlternatifModel::select('id_alternatif', 'nama_alternatif');

        // $penilaians = DataPenilaianModel::select('id_penilaian','id_kriteria', 'id_alternatif', 'nilai')
        //                     ->with('alternatif');

        return DataTables::of($alternatifs)
            ->addIndexColumn()
            ->addColumn('aksi', function ($alternatif) {
                $btn = '<a href="' . url('/admin/data_penilaian/' . $alternatif->id_alternatif . '/create') . '" class="btn btn-info btn-sm">Isi</a> ';
                $btn .= '<a href="' . url('/admin/data_penilaian/' . $alternatif->id_alternatif . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/data_penilaian/' . $alternatif->id_alternatif) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create(String $id)
    {
        $page = (object) [
            'title' => 'Tambah penilaian Baru',
        ];

        $activeMenu = 'data_penilaian';
        $dropdown = 'd_bansos';
        $alternatif = DataAlternatifModel::find($id);
        $kriteria = DataKriteriaModel::all();

        return view('admin.data_penilaian.create', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'alternatif' => $alternatif,
            'kriteria' => $kriteria
        ]);
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'id_alternatif' => 'required',
    //         'id_kriteria' => 'required',
    //         'nilai' => 'required'
    //     ]);

    //     DataPenilaianModel::create([
    //         'id_alternatif' => $request->id_alternatif,
    //         'id_kriteria' => $request->id_kriteria,
    //         'nilai' => $request->nilai
    //     ]);

    //     return redirect('admin/data_penilaian')->with('success', 'Data penilaian berhasil ditambahkan!');
    // }

    public function store(Request $request)
{
    $validated = $request->validate([
        'id_alternatif' => 'required',
        'nilai.*' => 'required|numeric',
    ]);

    try {
        $alternatif = DataAlternatifModel::findOrFail($request->id_alternatif);

        $kriteria = DataKriteriaModel::all(); // Ambil semua kriteria

        foreach ($kriteria as $index => $item) {
            $nilai = $request->nilai[$index];

            $penilaian = new DataPenilaianModel();
            $penilaian->id_alternatif = $alternatif->id_alternatif;
            $penilaian->id_kriteria = $item->id_kriteria;
            $penilaian->nilai = $nilai;
            $penilaian->save();
        }

        return redirect('admin/data_penilaian')->with('success', 'Data penilaian berhasil ditambahkan!');
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
}

    // public function show($id){
    //     $page = (object) [
    //         'title' => 'Detail Kartu Keluarga',
    //     ];
    //     $activeMenu = 'kartu_keluarga';
    //     $dropdown = 'd_penduduk';
    //     $kk = DataPenilaianModel::find($id);
    //     return view('admin.kk.show', [
    //         'page' => $page,
    //         'kk' => $kk,
    //         'activeMenu' => $activeMenu,
    //         'dropdown' => $dropdown
    //     ]);
    // }

    public function edit(string $id)
    {
        $page = (object) [
            'title' => 'Edit penilaian',
        ];
        $activeMenu = 'Bantuan Sosial';
        $dropdown = 'd_bansos';
        $penilaian = DataPenilaianModel::find($id);
        $alternatif = DataAlternatifModel::find($id);
        $kriteria = DataKriteriaModel::all();
        return view('admin.data_penilaian.edit', [
            'page' => $page,
            'penilaian' => $penilaian,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'alternatif' => $alternatif,
            'kriteria' => $kriteria
        ]);
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nilai.*' => 'required|numeric',
    ]);

    try {
        $alternatif = DataAlternatifModel::findOrFail($id);
        $kriteria = DataKriteriaModel::all();

        // Hapus semua penilaian terkait dengan alternatif ini
        $alternatif->penilaians()->delete();

        foreach ($kriteria as $index => $item) {
            if (isset($request->nilai[$index])) {
                $nilai = $request->nilai[$index];

                $penilaian = new DataPenilaianModel();
                $penilaian->id_alternatif = $alternatif->id_alternatif;
                $penilaian->id_kriteria = $item->id_kriteria;
                $penilaian->nilai = $nilai;
                $penilaian->save();
            }
        }

        return redirect('admin/data_penilaian')->with('success', 'Data penilaian berhasil diperbarui!');
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
}

    public function destroy($id)
    {
        $penilaian = DataPenilaianModel::find($id);

    if ($penilaian) {
        $penilaian->delete();
        return redirect('admin/data_penilaian')->with('success', 'Data Penilaian berhasil dihapus!');
    } else {
        return redirect('admin/data_penilaian')->with(  'error', 'Data Penilaian tidak ditemukan!');
    }
    }
    
}
