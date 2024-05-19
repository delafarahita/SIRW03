<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KasController extends Controller
{

    public function index()
    {
        $page = (object)[
            'title' => 'Kas RW 03',
        ];
        $activeMenu = 'kas';
        $dropdown = '';
        $kas = Kas::all();

        return view('admin.kas.index', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'kas' => $kas,
        ]);
        // return view('kas.index', ['kas' => $kas]);
    }

    // Menampilkan form untuk menambahkan data kas
    public function create()
    {
        return view('kas.create');
    }

    // Menyimpan data kas baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        Kas::create($request->all());

        return redirect()->route('kas.index')
            ->with('success', 'Data kas berhasil ditambahkan.');
    }

    // Menampilkan data kas yang ingin diubah
    public function edit(Kas $kas)
    {
        return view('kas.edit', compact('kas'));
    }

    // Memperbarui data kas yang telah diubah
    public function update(Request $request, Kas $kas)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        $kas->update($request->all());

        return redirect()->route('kas.index')
            ->with('success', 'Data kas berhasil diperbarui.');
    }

    // Menghapus data kas
    public function destroy(Kas $kas)
    {
        $kas->delete();

        return redirect()->route('kas.index')
            ->with('success', 'Data kas berhasil dihapus.');
    }
}
