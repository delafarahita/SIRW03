<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventarisModel;
use Yajra\DataTables\DataTables;

class InventarisController extends Controller
{

    public function index()
    {
        $page = (object) [
            'title' => 'INVENTARIS'
        ];
        $activeMenu = 'inventaris';
        $dropdown = '';
        return view('admin.inventaris.index', [
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'page' => $page
        ]);
    }


    public function list(Request $request)
    {
        $inventaris = InventarisModel::select(
            'id',
            'nama_barang',
            'jenis_barang',
            'jumlah_barang',
        );
        return DataTables::of($inventaris)
            ->addColumn('aksi', function ($inventaris) {
                $btn = '<a href="' . url('/admin/inventaris/' . $inventaris->id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/admin/inventaris/' . $inventaris->id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/inventaris/' . $inventaris->id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public  function create()
    {
        $page = (object) [
            'title' => 'INVENTARIS'
        ];
        $activeMenu = 'inventaris';
        $dropdown = '';
        return view('admin.inventaris.create', [
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'page' => $page
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'jumlah_barang' => 'required',
        ]);
        InventarisModel::create([
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'jumlah_barang' => $request->jumlah_barang,
        ]);
        return redirect('/admin/inventaris')->with('success', 'Data inventaris berhasil ditambahkan');
    }

    public function show($id)
    {
        $inventaris = InventarisModel::findOrFail($id);
        $page = (object) [
            'title' => 'INVENTARIS'
        ];
        $activeMenu = 'inventaris';
        $dropdown = '';
        return view('admin.inventaris.show', [
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'page' => $page,
            'inventaris' => $inventaris
        ]);
    }

    public function edit($id)
    {
        $inventaris = InventarisModel::findOrFail($id);
        $page = (object) [
            'title' => 'INVENTARIS'
        ];
        $activeMenu = 'inventaris';
        $dropdown = '';
        return view('admin.inventaris.edit', [
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'page' => $page,
            'inventaris' => $inventaris
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'jumlah_barang' => 'required',
        ]);
        $inventaris = InventarisModel::findOrFail($id);
        $inventaris->update([
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'jumlah_barang' => $request->jumlah_barang,
        ]);
        return redirect('/admin/inventaris')->with('success', 'Data inventaris berhasil diubah');
    }

    public function destroy($id)
    {
        $inventaris = InventarisModel::findOrFail($id);
        $inventaris->delete();
        return redirect('/admin/inventaris')->with('success', 'Data inventaris berhasil dihapus');
    }
}
