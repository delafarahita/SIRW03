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
            return redirect('admin/data_penilaian')->with('error', $e);    
        }
    }

    public function edit($id)
    {
        $page = (object) [
            'title' => 'Edit penilaian',
        ];
        $activeMenu = 'Bantuan Sosial';
        $dropdown = 'd_bansos';
        try {
            $penilaian = DataPenilaianModel::find($id);
            $Editpenilaian = DataPenilaianModel::where('id_alternatif', $id)->first();
            $alternatif = DataAlternatifModel::find($id);
            $kriteria = DataKriteriaModel::all();

            if ($penilaian && $Editpenilaian && $alternatif) {
                return view('admin.data_penilaian.edit', [
                    'page' => $page,
                    'penilaian' => $penilaian,
                    // 'Editpenilaian' => $Editpenilaian,
                    'activeMenu' => $activeMenu,
                    'dropdown' => $dropdown,
                    'alternatif' => $alternatif,
                    'kriteria' => $kriteria
                ]);
            }
            return view('admin.data_penilaian.index', [
                'page' => $page,
                'activeMenu' => $activeMenu,
                'dropdown' => $dropdown
            ])->with('warning', 'silahkan isi penilaian terlebih dahulu');

        } catch (\Exception $e) {
            return redirect('admin/data_penilaian')->with('error', 'Terjadi kesalahan saat menekan edit penilaian: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nilai.*' => 'required|numeric',
    ]);

    try {
        $alternatif = DataAlternatifModel::findOrFail($id);
        $kriteria = DataKriteriaModel::all();

        foreach ($kriteria as $index => $item) {
            if (isset($request->nilai[$index])) {
                $nilai = $request->nilai[$index];

                $penilaian = DataPenilaianModel::updateOrCreate(
                    [
                        'id_alternatif' => $alternatif->id_alternatif,
                        'id_kriteria' => $item->id_kriteria,
                    ],
                    [
                        'nilai' => $nilai,
                    ]
                );
            }
        }

        return redirect('admin/data_penilaian')->with('success', 'Data penilaian berhasil diperbarui!');
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
}

    public function destroy($id)
    {
        try {
            $penilaian = DataPenilaianModel::find($id);
            $alternatifTerkait = DataPenilaianModel::where('id_alternatif', $id);
            if ($alternatifTerkait) {
                $alternatifTerkait->delete();
                
                return redirect('admin/data_penilaian')->with('success', 'Data Penilaian berhasil dihapus!');
            }
            return redirect('admin/data_penilaian')->with('error', 'Data Penilaian tidak ditemukan!');
        } catch (\Exception $e) {
            //throw $th;
            return redirect('admin/data_penilaian')->with('error', 'Terjadi kesalahan saat menghapus data penilaian: ' . $e->getMessage());

        }
    }
    
}
