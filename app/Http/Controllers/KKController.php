<?php

namespace App\Http\Controllers;

use App\Models\DataPendudukModel;
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
            'no_kk' => 'required|unique:kk|numeric|number_sixteen',
            'kepala_keluarga' => 'required|string|alpha_spaces',
        ]);

        KKModel::create([
            'no_kk' => $request->no_kk,
            'kepala_keluarga' => $request->kepala_keluarga,
        ]);

        return redirect('admin/data_kk')->with('success', 'Data Kartu Keluarga berhasil ditambahkan!');
    }

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
            'no_kk' => 'required|numeric|number_sixteen',
            'kepala_keluarga' => 'required|alpha_spaces',
        ]);
        $kk = KKModel::find($id)->update([
            'no_kk' => $request->no_kk,
            'kepala_keluarga' => $request->kepala_keluarga,
        ]);
        return redirect('admin/data_kk')->with('success', 'Data Kartu Keluarga berhasil diupdate!');
    }

    public function destroy($id)
    {
        try {
            $kk = KKModel::find($id);
            $pendudukTerkait = DataPendudukModel::where('no_kk', $id);

            if ($pendudukTerkait) {
                return redirect('admin/data_kk')->with('error', 'Data Kartu Keluarga tidak dapat dihapus karena masih digunakan pada data penduduk!');
            }
            $kk->delete();
            return redirect('admin/data_kk')->with('success', 'Data Kartu Keluarga berhasil dihapus!');
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
