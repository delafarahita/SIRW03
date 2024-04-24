<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventarisController extends Controller
{

    public function index()
    {
        $page = (object) [
            'title' => 'INVENTARIS'
        ];
        $activeMenu = 'inventaris';
        $dropdown = '';
        return view('admin.inventaris.index', [
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'page' => $page
        ]);
    }


    public function list(Request $request)
    {
        $inventaris = collect([
            ['id' => 1, 'nama' => 'Raket', 'jumlah' => 2],
            ['id' => 2, 'nama' => 'Bola', 'jumlah' => 5],
            ['id' => 3, 'nama' => 'Pemain', 'jumlah' => 11],
        ]);

        if ($request->nama) {
            $inventaris = $inventaris->filter(function ($inv) use ($request) {
                return strpos($inv['nama'], $request->nama) !== false;
            });
        }
        $response = [
            'data' => $inventaris,
            'recordsTotal' => $inventaris->count(),
            'recordsFiltered' => $inventaris->count()
        ];

        return response()->json($response);
    }
}
