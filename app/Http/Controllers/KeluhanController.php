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
    // $keluhans = [
    //     (object) ['nama_penduduk' => 'John Doe', 'rt' => 'RT 01', 'keluhan' => 'Lorem ipsum dolor sit amet consectetur.', 'is_private' => false, 'reply' => 'Balasan 1', 'id' => 1],
    //     (object) ['nama_penduduk' => 'Jane Doe', 'rt' => 'RT 02', 'keluhan' => 'Lorem ipsum dolor sit amet consectetur.', 'is_private' => true, 'reply' => null, 'id' => 2],
    //     (object) ['nama_penduduk' => 'Alice Smith', 'rt' => 'RT 03', 'keluhan' => 'Lorem ipsum dolor sit amet consectetur.', 'is_private' => false, 'reply' => 'Balasan 3', 'id' => 3],
    // ];

    $keluhans = Keluhan::all();
        
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
        'foto' => 'fillable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if ($request->hasFile('foto')) {
        $imageName = time().'.'.$request->foto->extension();  
        $request->foto->move(public_path('images'), $imageName);
    } else {
        $imageName = null;
    }

    // $keluhan = new Keluhan([
    //     'nama_penduduk' => $request->get('nama_penduduk'),
    //     'rt' => $request->get('rt'),
    //     'keluhan' => $request->get('keluhan'),
    //     'foto' => $imageName,
    // ]);

    // $keluhan->save();

    // return redirect()->intended('/')->with('success', 'Keluhan berhasil dikirim.');

        

    Keluhan::create([
        'nama_penduduk' => $request->nama_penduduk,
        'rt' => $request->rt,
        'keluhan' => $request->keluhan,
        'foto' => $request->foto
    ]);
    return redirect('/')->with('success','saran / keluhan anda berhasil dikirim');
    // Simpan data ke database
    // $keluhan = new Keluhan();
    // $keluhan->nama_penduduk = $validatedData['nama'];
    // $keluhan->asal_rt = $validatedData['rt'];
    // $keluhan->keluhan = $validatedData['keluhan'];
    // $keluhan->save();
    }
}
