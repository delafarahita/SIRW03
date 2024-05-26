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
        $kegiatan = KegiatanModel::all(); // ambil data level untuk filter level

        return view('admin.kegiatan.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'kegiatan' => $kegiatan
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

        $jenis = KegiatanModel::$jenis;

        return view('admin.kegiatan.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'jenis' => $jenis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'tanggal' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Store the image in the public directory
        $path = $request->file('image_path')->store('public/image_path');

        $kegiatan = new KegiatanModel;
        $kegiatan->nama = $validatedData['nama'];
        $kegiatan->jenis = $validatedData['jenis'];
        $kegiatan->deskripsi = $validatedData['deskripsi'];
        $kegiatan->alamat = $validatedData['alamat'];
        $kegiatan->tanggal = $validatedData['tanggal'];
        $kegiatan->image_path = str_replace('public/', 'storage/', $path);

        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
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
            'title' => 'Edit Kegiatan',
            'list' => ['Home', 'Kegiatan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Kegiatan'
        ];

        $activeMenu = 'kegiatan';
        $dropdown = 'kegiatan';

        return view('admin.kegiatan.edit', [
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
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'tanggal' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Update data kegiatan
        $kegiatan->nama = $validatedData['nama'];
        $kegiatan->jenis = $validatedData['jenis'];
        $kegiatan->deskripsi = $validatedData['deskripsi'];
        $kegiatan->alamat = $validatedData['alamat'];
        $kegiatan->tanggal = $validatedData['tanggal'];

        // Jika ada gambar baru di-upload
        if ($request->hasFile('image_path')) {
            // Store the new image in the public directory
            $path = $request->file('image_path')->store('public/image_path');
            $kegiatan->image_path = str_replace('public/', 'storage/', $path);
        }

        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KegiatanModel $kegiatan)
    {
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil dihapus');
    }
}
