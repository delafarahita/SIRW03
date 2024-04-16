<?php

namespace App\Http\Controllers;

use App\Models\DataPendudukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DataPendudukController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Data Penduduk',
            'list' => ['Home', 'Data Penduduk']
        ];

        $page = (object) [
            'title' => 'Data Penduduk yang terdaftar dalam sistem'
        ];

        $activeMenu = 'Data Penduduk'; // set menu yang sedang aktif
        // $dataPenduduk = DataPendudukModel::all(); // ambil data level untuk filter level

        return view('admin.data_penduduk.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
}
