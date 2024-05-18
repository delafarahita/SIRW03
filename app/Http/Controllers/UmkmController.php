<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UmkmModel;
use App\Models\RTModel;

class UmkmController extends Controller
{
    public function index()
    {
        // $umkms = UmkmModel::all();
        $breadcrumb = (object) [
            'title' => 'Data UMKM',
            'list' => ['Home', 'Data UMKM']
        ];

        $page = (object) [
            'title' => 'Data UMKM'
        ];

        $dropdown = 'umkm';
        $activeMenu = 'Data UMKM';
        // $dataPenduduk = DataPendudukModel::all(); // ambil data level untuk filter level

        return view('admin.umkm.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'UMKM',
            'list' => ['Home', 'UMKM']
        ];

        $page = (object) [
            'title' => 'UMKM'
        ];

        $dropdown = 'umkm';

        $rt = RTModel::all();

        $activeMenu = 'umkm'; // set menu yang sedang aktif

        $kategori_umkm = UmkmModel::$kategori_umkm;

        return view('admin.umkm.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'rt' => $rt,
            'kategori_umkm'=> $kategori_umkm,
        ]);
    }

    public function store(Request $request)
    {
        UmkmModel::create($request->all());
        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil ditambahkan');
    }

    public function show($id)
    {
        $umkm = UmkmModel::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail UMKM',
            'list' => ['Home', 'UMKM', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail UMKM'
        ];


        $dropdown = 'umkm';

        $rt = RTModel::all();

        $activeMenu = 'umkm'; // set menu yang sedang aktif

        return view('admin.umkm.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'rt' => $rt,
        ]);
    }

    public function edit()
    {
        // $umkm = UmkmModel::findOrFail($id);
        $page = (object) [
            'title' => 'Edit Data UMKM',
        ];
        $activeMenu = 'umkm';
        $dropdown = '';
        $umkm = UmkmModel::all();
        $kategori_umkm = UmkmModel::$kategori_umkm;
        $rt = RTModel::all();
        return view('admin.umkm.edit', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'umkm' => $umkm,
            'kategori_umkm' => $kategori_umkm,
            'rt' => $rt
        ]);
    }

    public function update(Request $request, String $id)
    {
        $umkm = UmkmModel::findOrFail($id);
        $umkm->update($request->all());
        return redirect()->route('umkm.index');
    }

    public function destroy($id)
    {
        $umkm = UmkmModel::findOrFail($id);
        $umkm->delete();
        return redirect()->route('umkm.index');
    }
}

