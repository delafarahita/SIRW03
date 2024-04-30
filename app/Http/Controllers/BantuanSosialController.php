<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BantuanSosial extends Controller
{
    public function index() {
        $page = [
            'title' => 'Bantuan Sosial',
            'description' => 'Layanan Bantuan Sosial di Kecamatan Sindang'
        ];

        $activeMenu = 'bantuan_sosial';
        $dropdown = '';
        return view('admin.bantuan_sosial.index', [
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'page' => $page
        ]);
    }
}
