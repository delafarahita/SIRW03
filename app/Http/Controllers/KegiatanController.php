<?php

namespace App\Http\Controllers;

use App\Models\KegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'title' => 'Informasi Kegiatan'
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
        // $path = $request->file('image_path')->store('public/image_path');
        if ($request->hasFile('image_path')) {
            $imageFile = $request->file('image_path');
            $hashedName = $imageFile->hashName(); // Generate a unique file name

            // Store the file on the specified disk
            Storage::disk('img_kegiatan')->put($hashedName, file_get_contents($imageFile));

            // Save the hashed file name in the database
            $validatedData['image_path'] = $hashedName;
        }

        // Storage::disk('img_kegiatan')->put($request->file('image_path')->hashName(), $request->file('image_path'));
        
        $kegiatan = new KegiatanModel;
        $kegiatan->nama = $validatedData['nama'];
        $kegiatan->jenis = $validatedData['jenis'];
        $kegiatan->deskripsi = $validatedData['deskripsi'];
        $kegiatan->alamat = $validatedData['alamat'];
        $kegiatan->tanggal = $validatedData['tanggal'];
        $kegiatan->image_path = $validatedData['image_path'];

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

        $jenis = KegiatanModel::$jenis;

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
            'dropdown' => $dropdown,
            'kegiatan' => $kegiatan,
            'jenis' => $jenis,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kegiatan = KegiatanModel::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'tanggal' => 'required|date',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Nullable karena tidak wajib
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

            // Hapus gambar lama jika ada
            if ($kegiatan->image_path) {
                // Ubah path untuk menghapus file lama
                $oldImagePath = str_replace('storage/', 'public/', $kegiatan->image_path);
                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
            }

            $kegiatan->image_path = str_replace('public/', 'storage/', $path);
        }

        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kegiatan = KegiatanModel::find($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil dihapus');
    }
}
