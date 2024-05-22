<?php

namespace App\Http\Controllers;
// use App\Models\BantuanSosialModel;

use Illuminate\Http\Request;

class BantuanSosialController extends Controller
{
    public function index() {
        $page = (object) [
            'title' => 'Bantuan Sosial',
        ];
        // $bantuansosial = BantuanSosialModel::all();
        // return view('admin.bantuan_sosial.index', ['bantuansosial' => $bantuansosial]);

        $activeMenu = 'bantuan_sosial';
        $dropdown = '';
        return view('admin.bantuan_sosial.index', [
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'page' => $page
        ]);
    }
}
