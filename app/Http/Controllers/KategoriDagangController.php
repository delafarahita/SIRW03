<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriDagangModel;
use App\Models\UmkmModel;

class KategoriDagangController extends Controller
{
    public function index()
    {
        // $umkms = UmkmModel::all();
        $breadcrumb = (object) [
            'title' => 'Data UMKM',
            'list' => ['Home', 'Data UMKM']
        ];

        $page = (object) [
            'title' => 'Data UMKM Kategori Dagang'
        ];

        $dropdown = 'd_kategori_Dagang';
        $activeMenu = 'Data UMKM';
        $kategoriDagang = UmkmModel::where('kategori_umkm', 'Dagang')->paginate(4);
        // $dataPenduduk = DataPendudukModel::all(); // ambil data level untuk filter level
        $umkm = UmkmModel::all();
        return view('admin.kategori_Dagang.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'umkm' => $umkm,
            'kategoriDagang' => $kategoriDagang
        ]);
    }

    public function create()
    {
        return view('admin.kategori_Dagang.create');
    }

    public function store(Request $request)
    {
        KategoriDagangModel::create($request->all());
        return redirect()->route('kategori_Dagang.index');
    }

    public function show($id)
    {
        $kategori_Dagang = KategoriDagangModel::findOrFail($id);
        return view('admin.kategori_Dagang.show', compact('kategori_Dagang'));
    }

    public function edit($id)
    {
        $kategori_Dagang = KategoriDagangModel::findOrFail($id);
        return view('admin.kategori_Dagang.edit', compact('kategori_Dagang'));
    }

    public function update(Request $request, $id)
    {
        $kategori_Dagang = KategoriDagangModel::findOrFail($id);
        $kategori_Dagang->update($request->all());
        return redirect()->route('kategori_Dagang.index');
    }

    public function destroy($id)
    {
        $kategori_Dagang = KategoriDagangModel::findOrFail($id);
        $kategori_Dagang->delete();
        return redirect()->route('kategori_Dagang.index');
    }
}

