<?php

namespace App\Http\Controllers;

use App\Models\KegiatanModel;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $kegiatans = kegiatanModel::all();
        $breadcrumb = (object) [
            'title' => 'Info Kegiatan',
            'list' => ['Home', 'Info Kegiatan']
        ];

        $page = (object) [
            'title' => 'Info Kegiatan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'Info Kegiatan'; // set menu yang sedang aktif
        $dropdown = '';
        // $dataPenduduk = KegiatanModel::all(); // ambil data level untuk filter level

        return view('admin.kegiatan.index', [
            'breadcrumb' => $breadcrumb,
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
        $breadcrumb = (object) [
            'title' => 'kegiatan',
            'list' => ['Home', 'kegiatan']
        ];

        $page = (object) [
            'title' => 'kegiatan'
        ];

        $dropdown = 'kegiatan';

        $rt = KegiatanModel::all();

        $activeMenu = 'kegiatan'; // set menu yang sedang aktif

        //$kategori_kegiatan = KegiatanModel::$kategori_kegiatan;

        return view('admin.kegiatan.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'rt' => $rt,
            //'kategori_kegiatan'=> $kategori_kegiatan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KegiatanModel $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kegiatan = KegiatanModel::find($id);

        if (!$kegiatan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Edit Data Penduduk',
            'list' => ['Home', 'Data Penduduk', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Data Penduduk'
        ];

        $activeMenu = 'data_penduduk';
        $dropdown = 'd_penduduk';

        return view('admin.data_penduduk.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'kegiatan' => $kegiatan,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KegiatanModel $kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KegiatanModel $kegiatan)
    {
        //
    }
}
