<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $umkms = UmkmModel::all();
        $breadcrumb = (object) [
            'title' => 'Info Kegiatan',
            'list' => ['Home', 'Info Kegiatan']
        ];

        $page = (object) [
            'title' => 'Info Kegiatan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'Info Kegiatan'; // set menu yang sedang aktif
        // $dataPenduduk = DataPendudukModel::all(); // ambil data level untuk filter level

        return view('admin.kegiatan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
    }
}
