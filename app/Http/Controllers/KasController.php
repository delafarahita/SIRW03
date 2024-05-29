<?php

namespace App\Http\Controllers;

use App\Models\KasModel;
use App\Models\RTModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KasController extends Controller
{

    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Data Kas',
            'list' => ['Home', 'Data Kas']
        ];

        $page = (object) [
            'title' => 'Data Kas'
        ];

        $dropdown = 'd_kas';

        $activeMenu = 'kas';
        $rt = RTModel::all();

        return view('admin.kas.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'rt' => $rt
        ]);
    }

    public function list(Request $request)
    {
        $kas = KasModel::select(
            'id',
            'id_rt',
            'keterangan',
            'tanggal',
            'pemasukan',
            'pengeluaran',
        );

        return DataTables::of($kas)
            ->addColumn('aksi', function ($kas) {
                $btn = '<a href="' . url('/admin/kas/' . $kas->id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/kas/' . $kas->id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $rt = RTModel::all();
        $breadcrumb = (object) [
            'title' => 'Data Kas',
            'list' => ['Home', 'Data Kas', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Data Kas Baru'
        ];

        $activeMenu = 'kas';
        $dropdown = 'd_kas';

        return view('admin.kas.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'rt' => $rt,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_rt' => 'required',
            'keterangan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pemasukan' => 'required|numeric|min:0',
            'pengeluaran' => 'required|numeric|min:0',
        ]);

        KasModel::create($validated);

        return redirect('/admin/kas')->with('success', 'Data Kas berhasil disimpan');
    }

    public function show(string $id)
    {
        //$kas = KasModel::with('kas')->find($id);
        $kas = KasModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Data Kas',
            'list' => ['Home', 'Data Kas', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Data Kas'
        ];

        $dropdown = 'd_kas';

        $activeMenu = 'kas';

        return view('admin.kas.show', ['kas' => $kas, 'breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'dropdown' => $dropdown]);
    }

    public function edit(string $id)
    {
        $kas = KasModel::findOrFail($id);
        $rt = RTModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Data Kas',
            'list' => ['Home', 'Data Kas', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Data Kas'
        ];
        $activeMenu = 'kas';
        $dropdown = 'd_kas';

        return view('admin.kas.edit', [
            'kas' => $kas,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'rt' => $rt,
        ]);
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'id_rt' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'pemasukan' => 'required',
            'pengeluaran' => 'required',
        ]);

        $kas = KasModel::findOrFail($id);

        $kas->id_rt = $request->id_rt;
        $kas->keterangan = $request->keterangan;
        $kas->tanggal = $request->tanggal;
        $kas->pemasukan = $request->pemasukan;
        $kas->pengeluaran = $request->pengeluaran;

        $kas->save();

        return redirect('/admin/kas')->with('success', 'Data Kas berhasil diubah');
    }


    public function destroy(String $id)
    {
        $check = KasModel::find($id);
        if (!$check) {  // untuk mengecek apakah data kas dengan id yang dimaksud ada atau tidak
            return redirect('/admin/kas')->with('error', 'Data Kas tidak ditemukan');
        }
        try {
            KasModel::destroy($id);
            return redirect('/admin/kas')->with('success', 'Data Kas berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/admin/kas')->with('error', 'Data Kas gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
