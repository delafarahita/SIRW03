<?php

namespace App\Http\Controllers;

use App\Models\DataPendudukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DataPendudukController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Data Penduduk',
            'list' => ['Home', 'Data Penduduk']
        ];

        $page = (object) [
            'title' => 'DATA PENDUDUK'
        ];

        $dropdown = 'd_penduduk';

        $activeMenu = 'Data Penduduk'; // set menu yang sedang aktif
        // $dataPenduduk = DataPendudukModel::all(); // ambil data level untuk filter level

        return view('admin.data_penduduk.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Data Penduduk',
            'list' => ['Home', 'Data Penduduk', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Data Penduduk Baru'
        ];

        $pekerjaan = DataPendudukModel::$pekerjaan;

        $activeMenu = 'data_penduduk'; 

        return view('admin.data_penduduk.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'pekerjaan' => $pekerjaan]);
    }

    public function list(Request $request)
    {
        // $kategoris = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');

        // // Filter data user berdasarkan kategori_id
        // if ($request->kategori_id) {
        //     $kategoris->where('kategori_id', $request->kategori_id);
        // }

        // return DataTables::of($kategoris)
        //     ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
        //     ->addColumn('aksi', function ($kategori) { // menambahkan kolom aksi
        //         $btn = '<a href="' . url('/kategori/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
        //         $btn .= '<a href="' . url('/kategori/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
        //         $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $kategori->kategori_id) . '">'
        //             . csrf_field() . method_field('DELETE') .
        //             '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
        //         return $btn;
        //     })
        //     ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        //     ->make(true);
    }

    // Menyimpan data user baru
    public function store(Request $request)
    {
        $request->validate([
            // 'kategori_kode' => 'required|string|min:3|unique:m_kategoris,kategori_kode',
            // 'kategori_nama' => 'required|string|min:3'
        ]);

        // KategoriModel::create([
        //     'kategori_kode' => $request->kategori_kode,
        //     'kategori_nama' => $request->kategori_nama
        // ]);

        return redirect('/DataPenduduk')->with('success', 'Data Penduduk berhasil disimpan');
    }

    // Menampilkan detail user
    public function show(string $id)
    {
        //$kategori = KategoriModel::with('kategori')->find($id);
        //$kategori = KategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Data Penduduk',
            'list' => ['Home', 'Data Penduduk', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Data Penduduk'
        ];

        $activeMenu = 'dataPenduduk'; // set menu yang sedang aktif

        return view('admin.data_penduduk.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Menampilkan halaman form edit user
    public function edit(string $id)
    {
        // $kategori = KategoriModel::find($id);
        // $kategoris = KategoriModel::all(); // Melewatkan data kategori ke view

        $breadcrumb = (object) [
            'title' => 'Edit Data Penduduk',
            'list' => ['Home', 'Data Penduduk', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Data Penduduk'
        ];

        $activeMenu = 'dataPenduduk'; // set menu yang sedang aktif

        return view('admin.data_penduduk.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]); // Memasukkan variabel $kategoris ke dalam view
    }


    // Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'kategori_kode' => 'required|string|min:3|unique:m_kategoris,kategori_kode,' . $id . ',kategori_id',
            // 'kategori_nama' => 'required|string|min:3'
        ]);

        // KategoriModel::find($id)->update([
        //     'kategori_kode' => $request->kategori_kode,
        //     'kategori_nama' => $request->kategori_nama
        // ]);

        return redirect('/DataPenduduk')->with('success', 'Data Penduduk berhasil diubah');
    }

    // Menghapus data user
    public function destroy(string $id)
    {
        $check = DataPendudukModel::find($id);
        if (!$check) {  // untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect('/DataPenduduk')->with('error', 'Data Penduduk tidak ditemukan');
        }

        try {
            DataPendudukModel::destroy($id); // Hapus data kategori

            return redirect('/DataPenduduk')->with('success', 'Data Penduduk berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/DataPenduduk')->with('error', 'Data Penduduk gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
