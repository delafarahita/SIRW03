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
        (object) ['nama_penduduk' => 'John Doe', 'rt' => 'RT 01', 'keluhan' => 'Lorem ipsum dolor sit amet consectetur.', 'is_private' => false, 'reply' => 'Balasan 1', 'id' => 1],
        (object) ['nama_penduduk' => 'Jane Doe', 'rt' => 'RT 02', 'keluhan' => 'Lorem ipsum dolor sit amet consectetur.', 'is_private' => true, 'reply' => null, 'id' => 2],
        (object) ['nama_penduduk' => 'Alice Smith', 'rt' => 'RT 03', 'keluhan' => 'Lorem ipsum dolor sit amet consectetur.', 'is_private' => false, 'reply' => 'Balasan 3', 'id' => 3],
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
    // echo '<pre>';
    // print_r($request->all());
    // Validasi data yang dikirim dari form
    $validated = $request->validate([
        'nama_penduduk' => 'required',
        'rt' => 'required',
        'keluhan' => 'required',
    ]);
        

    Keluhan::create([
        'nama_penduduk' => $request->nama_penduduk,
        'rt' => $request->rt,
        'keluhan' => $request->keluhan,
    ]);
    return redirect()->intended('/');
    // Simpan data ke database
    // $keluhan = new Keluhan();
    // $keluhan->nama_penduduk = $validatedData['nama'];
    // $keluhan->asal_rt = $validatedData['rt'];
    // $keluhan->keluhan = $validatedData['keluhan'];
    // $keluhan->save();


    }
}
