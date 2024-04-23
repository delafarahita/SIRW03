<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UmkmModel;

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
            'title' => 'Data UMKM yang terdaftar dalam sistem'
        ];
        $dropdown = 'd_umkm';
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
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        UmkmModel::create($request->all());
        return redirect()->route('umkm.index');
    }

    public function show($id)
    {
        $umkm = UmkmModel::findOrFail($id);
        return view('admin.umkm.show', compact('umkm'));
    }

    public function edit($id)
    {
        $umkm = UmkmModel::findOrFail($id);
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, $id)
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

