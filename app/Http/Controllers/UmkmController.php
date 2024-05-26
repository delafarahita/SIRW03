<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UmkmModel;
use App\Models\RTModel;

class UmkmController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Data UMKM',
            'list' => ['Home', 'Data UMKM']
        ];

        $page = (object) [
            'title' => 'Data UMKM'
        ];

        $activeMenu = 'Data UMKM';
        $dropdown = 'umkm';
        $kategori = UmkmModel::all();

        return view('admin.umkm.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'kategori' => $kategori
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
        $validatedData = $request->validate([
            'id_umkm' => 'required',
            'nama_umkm' => 'required',
            'kategori_umkm' => 'required',
            'pemilik_umkm' => 'required',
            'alamat_umkm' => 'required',
            'id_rt' => 'required',
            'rw' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'deskripsi_umkm' => 'required',
        ]);

        $path = $request->file('image_path')->store('public/image_path');

        $kategori = new UmkmModel;
        $kategori->nama_umkm = $validatedData['nama_umkm'];
        $kategori->kategori_umkm = $validatedData['kategori_umkm'];
        $kategori->pemilik_umkm = $validatedData['pemilik_umkm'];
        $kategori->alamat_umkm = $validatedData['alamat_umkm'];
        $kategori->id_rt = $validatedData['id_rt'];
        $kategori->rw = $validatedData['rw'];
        $kategori->kelurahan = $validatedData['kelurahan'];
        $kategori->kecamatan = $validatedData['kecamatan'];
        $kategori->image_path = str_replace('public/', 'storage/', $path);
        $kategori->deskripsi_umkm = $validatedData['deskripsi_umkm'];

        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil ditambahkan');
        $kategori->save();

        // UmkmModel::create($request->all());
        // return redirect()->route('umkm.index')->with('success', 'UMKM berhasil ditambahkan');
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

    public function update(Request $request, UmkmModel $kategori)
    {
        $validatedData = $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'kategori_umkm' => 'required|string|max:255',
            'pemilik_umkm' => 'required|string|max:255',
            'alamat_umkm' => 'required|string|max:255',
            'id_rt' => 'required',
            'rw' => 'required',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'deskripsi_umkm' => 'required|string|max:255',
        ]);

        $kategori->nama_umkm = $validatedData['nama_umkm'];
        $kategori->kategori_umkm = $validatedData['kategori_umkm'];
        $kategori->pemilik_umkm = $validatedData['pemilik_umkm'];
        $kategori->alamat_umkm = $validatedData['alamat_umkm'];
        $kategori->id_rt = $validatedData['id_rt'];
        $kategori->rw = $validatedData['rw'];
        $kategori->kelurahan = $validatedData['kelurahan'];
        $kategori->kecamatan = $validatedData['kecamatan'];
        $kategori->deskripsi_umkm = $validatedData['deskripsi_umkm'];

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('public/image_path');
            $kategori->image_path = str_replace('public/', 'storage/', $path);
        }

        $kategori->save();

        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil diperbarui');

        // $umkm = UmkmModel::findOrFail($id);
        // $umkm->update($request->all());
        // return redirect()->route('umkm.index');
    }

    public function destroy($id)
    {
        $umkm = UmkmModel::findOrFail($id);
        $umkm->delete();
        return redirect()->route('umkm.index');
    }
}

