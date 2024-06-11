<?php

namespace App\Http\Controllers;

use App\Models\DataPendudukModel;
use Illuminate\Http\Request;
use App\Models\RTModel;
use Yajra\DataTables\Facades\DataTables;

class RTController extends Controller
{
    public function index()
    {
        $page = (object) [
            'title' => 'Daftar RT',
        ];
        $activeMenu = 'rt';
        $dropdown = 'd_penduduk';

        return view('admin.rt.index', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function list(Request $request)
    {
        $rts = RTModel::select('id_rt', 'nama_rt');

        return DataTables::of($rts)
            ->addIndexColumn()
            ->addColumn('aksi', function ($rt) {
                $btn = '<a href="' . url('admin/data_rt/' . $rt->id_rt . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/data_rt/' . $rt->id_rt) . '">'
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
            'title' => 'Tambah Data RT',
        ];
        $activeMenu = 'rt';
        $dropdown = 'd_penduduk';

        return view('admin.rt.create', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_rt' => 'required|unique:rt|numeric',
            'nama_rt' => 'required|string|alpha_spaces',
        ]);
        RTModel::create([
            'id_rt' => $request->id_rt,
            'nama_rt' => $request->nama_rt,
        ]);

        return redirect('/admin/data_rt')->with('success', 'Data RT baru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $page = (object) [
            'title' => 'Edit Data RT',
        ];
        $activeMenu = 'rt';
        $dropdown = 'd_penduduk';
        $rt = RTModel::find($id);

        return view('admin.rt.edit', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'rt' => $rt
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_rt' => 'required|numeric',
            'nama_rt' => 'required|alpha_spaces',
        ]);
        $rt = RTModel::find($id)->update([
            'id_rt' => $request->id_rt,
            'nama_rt' => $request->nama_rt,
        ]);
        return redirect('/admin/data_rt')->with('success', 'Data RT baru berhasil ditambahkan');
    }

    public function destroy($id)
    {
        try {
            $rt = RTModel::findOrFail($id);
            $rtTerkait = DataPendudukModel::where('id_rt', $id)->exists();
    
            if ($rtTerkait) {
                return redirect('/admin/data_rt')->with('error', 'Data RT tidak dapat dihapus karena masih digunakan pada data penduduk');
            }
    
            $rt->delete();
            return redirect('/admin/data_rt')->with('success', 'Data RT berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('admin/data_rt')->with('error', 'Data RT tidak dapat dihapus karena masih digunakan pada fitur lain');
        }
    }

}
