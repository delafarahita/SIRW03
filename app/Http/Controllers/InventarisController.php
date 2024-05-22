<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventarisModel;
use App\Models\PinjamInventarisModel;
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
            'inventaris_id',
            'nama_barang',
            'jenis_barang',
            'jumlah_barang',
            'status_barang',
        );
        return DataTables::of($inventaris)
            ->addColumn('aksi', function ($inventaris) {
                $btn = '<a href="' . url('/admin/inventaris/' . $inventaris->inventaris_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/admin/inventaris/' . $inventaris->inventaris_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/inventaris/' . $inventaris->inventaris_id) . '">'
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

    public function createPinjam()
    {
        $inventaris = InventarisModel::all();
        $page = (object) [
            'title' => 'PINJAM INVENTARIS'
        ];
        $activeMenu = 'inventaris';
        $dropdown = '';
        return view('admin.inventaris.createPinjam', [
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'page' => $page,
            'inventaris' => $inventaris
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'jumlah_barang' => 'required',
            'status_barang' => 'required',
        ]);
        InventarisModel::create([
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'status_barang' => $request->status_barang,
        ]);
        return redirect('/admin/inventaris')->with('success', 'Data inventaris berhasil ditambahkan');
    }

    public function storePinjam(Request $request)
    {
        $validated = $request->validate([
            'peminjam' => 'required',
            'inventaris_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);
        PinjamInventarisModel::create([
            'inventaris_id'     => $request->inventaris_id,
            'peminjam'          => $request->peminjam,
            'tanggal_pinjam'    => $request->tanggal_pinjam,
            'tanggal_kembali'   => $request->tanggal_kembali,
        ]);

        return redirect('/admin/inventaris')->with('success', 'Data peminjam berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $inventaris = InventarisModel::find($id);
        $pinjamInventaris = PinjamInventarisModel::where('inventaris_id', $id)->get();
        $page = (object) [
            'title' => 'INVENTARIS'
        ];
        $activeMenu = 'inventaris';
        $dropdown = '';
        return view('admin.inventaris.show', [
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'page' => $page,
            'inventaris' => $inventaris,
            'pinjamInventaris' => $pinjamInventaris
        ]);
    }

    public function edit(string $id)
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


    public function editPinjam(string $id)
    {
        $pinjam = PinjamInventarisModel::find($id);
        $inventaris = InventarisModel::all();
        $page = (object) [
            'title' => 'PINJAM INVENTARIS'
        ];
        $activeMenu = 'inventaris';
        $dropdown = '';
        return view('admin.inventaris.editPinjam', [
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'page' => $page,
            'pinjam' => $pinjam,
            'inventaris' => $inventaris
        ]);
    }


    public function update(Request $request,string $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'jumlah_barang' => 'required',
            'status_barang' => 'required',
        ]);
        $inventaris = InventarisModel::findOrFail($id);
        $inventaris->update([
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'status_barang' => $request->status_barang,
        ]);
        return redirect('/admin/inventaris')->with('success', 'Data inventaris berhasil diubah');
    }


    public function updatePinjam(Request $request,string $id)
    {
        $validated = $request->validate([
            'peminjam' => 'required',
            'inventaris_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);
        $pinjam = PinjamInventarisModel::findOrFail($id);
        $pinjam->update([
            'inventaris_id'     => $request->inventaris_id,
            'peminjam'          => $request->peminjam,
            'tanggal_pinjam'    => $request->tanggal_pinjam,
            'tanggal_kembali'   => $request->tanggal_kembali,
        ]);
        return redirect('/admin/inventaris')->with('success', 'Data peminjam berhasil diubah');
    }

    public function destroy(string $id)
    {
        $inventaris = InventarisModel::findOrFail($id);
        $inventaris->delete();
        return redirect('/admin/inventaris')->with('success', 'Data inventaris berhasil dihapus');
    }

    public function destroyPinjam(string $id)
    {
        $pinjam = PinjamInventarisModel::findOrFail($id);
        $pinjam->delete();
        return redirect('/admin/inventaris')->with('success', 'Data peminjam berhasil dihapus');
    }
}
