<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriUmkmModel;


class KategoriUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = (object) [
            'title' => 'Daftar Kategori UMKM',
        ];
        $activeMenu = 'umkm';
        $dropdown = 'umkm';

        return view('admin.umkm.index', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = (object) [
            'title' => 'Tambah Data Kategori UMKM',
        ];
        $activeMenu = 'umkm';
        $dropdown = 'umkm';

        return view('admin.umkm.create', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_usaha' => 'required|unique:rt',
            'nama_usaha' => 'required',
        ]);
        KategoriUmkmModel::create([
            'id_usaha' => $request->id_usaha,
            'nama_usaha' => $request->nama_usaha,
        ]);

        return redirect('/admin/data_kategori_umkm')->with('success', 'Data Kategori UMKM baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
