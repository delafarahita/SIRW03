<?php

namespace App\Http\Controllers;

use App\Models\DataPendudukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\RTModel;
use App\Models\KKModel;
use Brick\Math\BigInteger;

class DataPendudukController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Data Penduduk',
            'list' => ['Home', 'Data Penduduk']
        ];

        $page = (object) [
            'title' => 'DATA PENDUDUK'
        ];

        $dropdown = 'd_penduduk';

        $activeMenu = 'Data Penduduk'; // set menu yang sedang aktif
        $rt = RTModel::all();
        $kk = KKModel::all();

        return view('admin.data_penduduk.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'kk' => $kk,
            'rt' => $rt
        ]);
    }

    public function list(Request $request)
    {
        $penduduks = DataPendudukModel::select(
            'nik',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'gol_darah',
            'jenis_kelamin',
        );

        return DataTables::of($penduduks)
            ->addColumn('aksi', function ($penduduk) {
                $btn = '<a href="' . url('/admin/data_penduduk/' . $penduduk->nik) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/admin/data_penduduk/' . $penduduk->nik . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/data_penduduk/' . $penduduk->nik) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $kk = KKModel::all();
        $rt = RTModel::all();
        $pekerjaan = DataPendudukModel::$pekerjaan;
        $gol_darah = DataPEndudukModel::$gol_darah;
        $jenis_kelamin = DataPendudukModel::$jenis_kelamin;
        $kewarganegaraan = DataPendudukModel::$kewarganegaraan;
        $agama     = DataPendudukModel::$agama;
        $domisili     = DataPendudukModel::$domisili;
        $breadcrumb = (object) [
            'title' => 'Data Penduduk',
            'list' => ['Home', 'Data Penduduk', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Data Penduduk Baru'
        ];

        $activeMenu = 'data_penduduk';
        $dropdown = 'd_penduduk';

        return view('admin.data_penduduk.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'pekerjaan' => $pekerjaan,
            'kk' => $kk,
            'rt' => $rt,
            'gol_darah' => $gol_darah,
            'jenis_kelamin' => $jenis_kelamin,
            'kewarganegaraan' => $kewarganegaraan,
            'agama' => $agama,
            'domisili' => $domisili
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|regex:/^[0-9]{16}$/|unique:data_penduduk',
            'no_kk' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'gol_darah' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'rw' => 'required',
            'id_rt' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kewarganegaraan' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'domisili' => 'required'
        ]);

        DataPendudukModel::create([
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gol_darah' => $request->gol_darah,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'rw' => $request->rw,
            'id_rt' => $request->id_rt,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'pekerjaan' => $request->pekerjaan,
            'agama' => $request->agama,
            'domisili' => $request->domisili
        ]);

        return redirect('/admin/data_penduduk')->with('success', 'Data Penduduk berhasil disimpan');
    }

    public function show(string $id)
    {
        //$penduduk = DataPendudukModel::with('data_penduduk')->find($id);
        $penduduk = DataPendudukModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Data Penduduk',
            'list' => ['Home', 'Data Penduduk', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Data Penduduk'
        ];


        $dropdown = 'd_penduduk';

        $activeMenu = 'dataPenduduk'; // set menu yang sedang aktif

        return view('admin.data_penduduk.show', ['penduduk' => $penduduk, 'breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'dropdown' => $dropdown]);
    }

    public function edit(string $id)
    {
        $penduduk = DataPendudukModel::find($id);
        $kk = KKModel::all();
        $rt = RTModel::all();
        $pekerjaan = DataPendudukModel::$pekerjaan;
        $gol_darah = DataPEndudukModel::$gol_darah;
        $jenis_kelamin = DataPendudukModel::$jenis_kelamin;
        $kewarganegaraan = DataPendudukModel::$kewarganegaraan;
        $agama     = DataPendudukModel::$agama;
        $domisili     = DataPendudukModel::$domisili;

        $breadcrumb = (object) [
            'title' => 'Edit Data Penduduk',
            'list' => ['Home', 'Data Penduduk', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Data Penduduk'
        ];
        $activeMenu = 'dataPenduduk';
        $dropdown = 'd_penduduk';

        return view('admin.data_penduduk.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'pekerjaan' => $pekerjaan,
            'penduduk' => $penduduk,
            'kk' => $kk,
            'rt' => $rt,
            'gol_darah' => $gol_darah,
            'jenis_kelamin' => $jenis_kelamin,
            'kewarganegaraan' => $kewarganegaraan,
            'agama' => $agama,
            'domisili' => $domisili
        ]);
    }

    public function update(Request $request, String $id)
    {
        $validated = $request->validate([
            'nik'               => 'required',
            'no_kk'             => 'required',
            'nama'              => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'gol_darah'         => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'            => 'required',
            'rw'                => 'required',
            'id_rt'             => 'required',
            'kelurahan'         => 'required',
            'kecamatan'         => 'required',
            'kewarganegaraan'   => 'required',
            'pekerjaan'         => 'required',
            'agama'             => 'required',
            'domisili'          => 'required'
        ]);

        DataPendudukModel::find($id)->update([
            'nik'           => $request->nik,
            'no_kk'         => $request->no_kk,
            'nama'          => $request->nama,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gol_darah'     => $request->gol_darah,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'        => $request->alamat,
            'rw'            => $request->rw,
            'id_rt'         => $request->id_rt,
            'kelurahan'     => $request->kelurahan,
            'kecamatan'     => $request->kecamatan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'pekerjaan'     => $request->pekerjaan,
            'agama'         => $request->agama,
            'domisili'      => $request->domisili
        ]);

        return redirect('/admin/data_penduduk')->with('success', 'Data Penduduk berhasil diubah');
    }

    public function destroy(String $id)
    {
        $check = DataPendudukModel::find($id);
        if (!$check) {  // untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect('/admin/data_penduduk')->with('error', 'Data Penduduk tidak ditemukan');
        }
        try {
            DataPendudukModel::destroy($id);
            return redirect('/admin/data_penduduk')->with('success', 'Data Penduduk berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/admin/data_penduduk')->with('error', 'Data Penduduk gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
