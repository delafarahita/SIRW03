<?php

namespace App\Http\Controllers;

use App\Models\KegiatanModel;
use App\Models\UmkmModel;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanModel::orderBy('tanggal', 'desc')->paginate(3);
        $umkm = UmkmModel::all();

        return view('/welcome', [
            'kegiatan' => $kegiatan,
            'umkm' => $umkm
        ]);

        // $kegiatan = KegiatanModel::paginate(3); // jumlah item per halaman
        // return view('kegiatan.index', compact('kegiatan'));
    }

    public function fileUpload()
    {
        return view('welcome');
    }
    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'berkas' => 'required|file|image|max:500',
        ]);
        $extension = $request->berkas->getClientOriginalExtension();
        $namaFile = $request->nama_foto . '.' . $extension;
        $request->berkas->move('foto', $namaFile);
        $pathBaru = asset('foto/' . $namaFile);
        // echo "Gambar berhasil di upload ke:<a href='$pathBaru'>$namaFile</a>";
        // echo "<br>";
        // echo "<img src='$pathBaru' alt='$namaFile' style='max-width: 500px;
        // height: auto'>";
    }
}
