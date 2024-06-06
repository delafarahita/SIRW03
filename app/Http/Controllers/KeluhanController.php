<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluhan;
use Illuminate\Support\Facades\Storage;

class KeluhanController extends Controller
{

    public function index()
    {

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
        $validatedData = $request->validate([
            'nama_penduduk' => 'required',
            'rt' => 'required',
            'keluhan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        

        if ($request->hasFile('foto')) {
            $imageFile = $request->file('foto');
            $hashedName = $imageFile->hashName(); // Generate a unique file name

            // Store the file on the specified disk
            Storage::disk('img_keluhan')->put($hashedName, file_get_contents($imageFile));

            // Save the hashed file name in the database
            $validatedData['foto'] = $hashedName;
        }
        else {
            $validatedData['foto'] = null;
        }

        $keluhan = new Keluhan();
        $keluhan->nama_penduduk = $validatedData['nama_penduduk'];
        $keluhan->rt = $validatedData['rt'];
        $keluhan->keluhan = $validatedData['keluhan'];
        $keluhan->foto = $validatedData['foto'];
        // $keluhan->tanggal = $validatedData['tanggal'];
        // $keluhan->image_path = $validatedData['image_path'];

        $keluhan->save();

        // Keluhan::create([
        //     'nama_penduduk' => $request->nama_penduduk,
        //     'rt' => $request->rt,
        //     'keluhan' => $request->keluhan,
        //     'foto' => $imageName ? '/storage/images/' . $imageName : null
        // ]);


        return redirect('/')->with('success', 'saran / keluhan anda berhasil dikirim');
    }
}
