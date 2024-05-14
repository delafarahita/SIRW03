<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatifModel;
use App\Models\DataKriteriaModel;
use Illuminate\Http\Request;
use App\Models\DataPenilaianModel;
use Yajra\DataTables\Facades\DataTables;

class DataPerhitunganController extends Controller
{
    public function index() {
        $page = (object) [
            'title' => 'Perhitungan Metode Edas Bantuan Sosial',
        ];

        $activeMenu = 'data_perhitungan';
        $dropdown = 'd_bansos';

        $kriteria = DataKriteriaModel::all();
        $alternatif = DataAlternatifModel::all();
        $penilaian = DataPenilaianModel::all();

        
        return view('admin.data_perhitungan.index', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'kriteria' => $kriteria,
            'alternatif' => $alternatif,
            'penilaian' => $penilaian
        ]);
    }

    public function list(Request $request)
    {
        $alternatifs = DataAlternatifModel::select('id_alternatif', 'nama_alternatif');

        $penilaians = DataPenilaianModel::select('id_penilaian','id_kriteria', 'id_alternatif', 'nilai');

        return DataTables::of($penilaians)
            // ->addIndexColumn()
            // ->addColumn('aksi', function ($alternatif) {
            //     $btn = '<a href="' . url('/admin/data_penilaian/' . $alternatif->id_alternatif . '/create') . '" class="btn btn-info btn-sm">Isi</a> ';
            //     $btn .= '<a href="' . url('/admin/data_penilaian/' . $alternatif->id_alternatif . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
            //     return $btn;
            // })
            // ->rawColumns(['aksi'])
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
            'id_alternatif' => 'nullable|required_without:id_alternatif_default|default:1',
            'id_kriteria' => 'required',
            'nilai' => 'required'
        ]);

        DataPenilaianModel::create([
            'id_alternatif' => $request->id_alternatif ?? $request->id_alternatif_default,
            'id_kriteria' => $request->id_kriteria,
            'nilai' => $request->nilai
        ]);

        return redirect('admin/data_penilaian')->with('success', 'Data penilaian berhasil ditambahkan!');
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
        return view('admin.data_penilaian.edit', [
            'page' => $page,
            'penilaian' => $penilaian,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_penilaian' => 'required',
            'nama_penilaian' => 'required',
            'bobot' => 'required',
            'jenis' => 'required'
        ]);
        $penilaian = DataPenilaianModel::find($id)->update([
            'kode_penilaian' => $request->kode_penilaian,
            'nama_penilaian' => $request->nama_penilaian,
            'bobot' => $request->bobot,
            'jenis' => $request->jenis,
        ]);
        return redirect('admin/data_penilaian')->with('success', 'Data penilaian berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kriteria = DataPenilaianModel::find($id);
        $kriteria->delete();
        return redirect('admin/data_kriteria')->with('success', 'Data Kriteria berhasil dihapus!');
    }
    
}
