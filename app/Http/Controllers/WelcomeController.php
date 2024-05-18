<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function fileUpload(){
        return view('welcome');
    }
    public function prosesFileUpload(Request $request){
        $request->validate([
            'berkas'=>'required|file|image|max:500',
            ]);
        $extension = $request->berkas->getClientOriginalExtension();
        $namaFile = $request->nama_foto.'.'.$extension;
        $request->berkas->move('foto',$namaFile);
        $pathBaru = asset('foto/'.$namaFile);
            // echo "Gambar berhasil di upload ke:<a href='$pathBaru'>$namaFile</a>";
            // echo "<br>";
            // echo "<img src='$pathBaru' alt='$namaFile' style='max-width: 500px;
            // height: auto'>";
    }
    }

