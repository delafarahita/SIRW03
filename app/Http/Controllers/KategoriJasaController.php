<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriJasaModel;
use App\Models\UmkmModel;

class KategoriJasaController extends Controller
{
    public function index()
    {
        // $umkms = UmkmModel::all();
        $breadcrumb = (object) [
            'title' => 'Data UMKM',
            'list' => ['Home', 'Data UMKM']
        ];

        $page = (object) [
            'title' => 'Data UMKM Kategori Jasa'
        ];
        $dropdown = 'd_kategori_Jasa';
        $activeMenu = 'Data UMKM';

        $kategoriJasa = UmkmModel::where('kategori_umkm', 'Jasa')->paginate(4);
        // $dataPenduduk = DataPendudukModel::all(); // ambil data level untuk filter level

        return view('admin.kategori_Jasa.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'kategoriJasa' => $kategoriJasa
        ]);
    }

    public function create()
    {
        return view('admin.kategori_Jasa.create');
    }

    public function store(Request $request)
    {
        KategoriJasaModel::create($request->all());
        return redirect()->route('kategori_Jasa.index');
    }

    public function show($id)
    {
        $kategori_Jasa = KategoriJasaModel::findOrFail($id);
        return view('admin.kategori_Jasa.show', compact('kategori_Jasa'));
    }

    public function edit($id)
    {
        $kategori_Dagang = KategoriJasaModel::findOrFail($id);
        return view('admin.kategori_Jasa.edit', compact('kategori_Jasa'));
    }

    public function update(Request $request, $id)
    {
        $kategori_Jasa = KategoriJasaModel::findOrFail($id);
        $kategori_Jasa->update($request->all());
        return redirect()->route('kategori_Jasa.index');
    }

    public function destroy($id)
    {
        $kategori_Jasa = KategoriJasaModel::findOrFail($id);
        $kategori_Jasa->delete();
        return redirect()->route('kategori_Jasa.index');
    }
}

