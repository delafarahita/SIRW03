<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BantuanSosial extends Controller
{

    public function index() {
        $data = [
            'title' => 'Bantuan Sosial',
            'description' => 'Layanan Bantuan Sosial di Kecamatan Sindang'
        ];
        return view('bantuansosial.index', $data);
    }
}
