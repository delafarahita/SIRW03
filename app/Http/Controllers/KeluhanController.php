<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluhan;

class KeluhanController extends Controller
{

    public function index(){

    $breadcrumb = (object) [
        'title' => 'Keluhan',
        'list' => ['Home', 'Keluhan']
    ];

    $page = (object) [
        'title' => 'Keluhan Penduduk'
    ];

    $activeMenu = 'Keluhan Penduduk'; // set menu yang sedang aktif
    $dropdown = '';

    // Simulasi data keluhan (Anda akan menggantinya dengan data sebenarnya)
    $keluhans = [
        (object) ['nama_penduduk' => 'John Doe', 'asal_rt' => 'RT 01', 'keluhan' => 'Lorem ipsum dolor sit amet consectetur.', 'is_private' => false, 'reply' => 'Balasan 1', 'id' => 1],
        (object) ['nama_penduduk' => 'Jane Doe', 'asal_rt' => 'RT 02', 'keluhan' => 'Lorem ipsum dolor sit amet consectetur.', 'is_private' => true, 'reply' => null, 'id' => 2],
        (object) ['nama_penduduk' => 'Alice Smith', 'asal_rt' => 'RT 03', 'keluhan' => 'Lorem ipsum dolor sit amet consectetur.', 'is_private' => false, 'reply' => 'Balasan 3', 'id' => 3],
    ];

    return view('admin.keluhan.index', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'activeMenu' => $activeMenu,
        'dropdown' => $dropdown,
        'keluhans' => $keluhans
    ]);
}

public function store(Request $request)
{
    // Validasi data yang dikirim dari form
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'rt' => 'required|string|max:255',
        'keluhan' => 'required|string',
    ]);

    // Simpan data ke database
    $keluhan = new Keluhan();
    $keluhan->nama_penduduk = $validatedData['nama'];
    $keluhan->asal_rt = $validatedData['rt'];
    $keluhan->keluhan = $validatedData['keluhan'];
    $keluhan->save();

    // Redirect ke halaman lain atau tampilkan pesan sukses
    return redirect()->route('keluhan.index')->with('success', 'Keluhan berhasil dikirim!');
}
}
