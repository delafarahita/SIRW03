<?php

namespace App\Http\Controllers;

use App\Models\DataPendudukModel;
use App\Models\KegiatanModel;
use App\Models\KKModel;
use App\Models\RTModel;
use App\Models\UmkmModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $activeMenu = 'dashboard';
        $dropdown = 'false';
        $page = (object) [
            'title' => 'Dashboard',
        ];

        $totalPenduduk = $this->totalPenduduk();
        $totalRT = $this->totalRT();
        $totalUmkm = $this->totalUMKM();
        $totalKeluarga = $this->totalKeluarga();
        $chartData = $this->chart_total_penduduk_by_rt();
        $totalLaki = $this->totalLaki_laki();
        $totalPerempuan = $this->totalPerempuan();
        $totalBalita = $this->totalBalita();
        $totalKanak = $this->totalKanak_kanak();
        $totalRemaja = $this->totalRemaja();
        $totalDewasa = $this->totalDewasa();
        $totalLansia = $this->totalLansia();
        $kegiatan = $this->kegiatanDatang();

        return view('admin.dashboard.index',[
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'page' => $page,
            'totalPenduduk' => $totalPenduduk,
            'totalRT' => $totalRT,
            'totalUmkm' => $totalUmkm,
            'totalKeluarga' => $totalKeluarga,
            'chartData' => $chartData,
            'totalLaki' => $totalLaki,
            'totalPerempuan' => $totalPerempuan,
            'totalBalita' => $totalBalita,
            'totalKanak' => $totalKanak,
            'totalRemaja' => $totalRemaja,
            'totalDewasa' => $totalDewasa,
            'totalLansia' => $totalLansia,
            'kegiatan' => $kegiatan,
        ]);
    }

    public function totalPenduduk() {
        $penduduk = DataPendudukModel::all();
        $totalPenduduk = $penduduk->count();

        return $totalPenduduk;
    }

    public function totalRT() {
        $rt = RTModel::all();
        $totalRT = $rt->count();

        return $totalRT;
    }

    public function totalUMKM() {
        $umkm = UmkmModel::all();
        $totalUmkm = $umkm->count();

        return $totalUmkm;
    }

    public function totalKeluarga() {
        $keluarga = KKModel::all();
        $totalKeluarga = $keluarga->count();

        return $totalKeluarga;
    }

    public function total_penduduk_by_rt(){
        $penduduk = DataPendudukModel::select('id_rt', DB::raw('count(*) as total'))
                    ->groupBy('id_rt')
                    ->get();

        return $penduduk;
    }

    public function chart_total_penduduk_by_rt(){
        $totalPendudukByRT = $this->total_penduduk_by_rt();

        $labels = [];
        $data = [];

        foreach ($totalPendudukByRT as $item) {
            $labels[] = 'RT ' . $item->id_rt;
            $data[] = $item->total;
        }

        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Total Penduduk tiap RT',
                    'data' => $data,
                    'borderWidth' => 1
                ]
            ]
        ];

        return $chartData;
    }

    public function totalLaki_laki(){
        $totalLaki = DataPendudukModel::where('jenis_kelamin', 'L')->count();

        return $totalLaki;
    }
    public function totalPerempuan(){
        $totalPerempuan = DataPendudukModel::where('jenis_kelamin', 'P')->count();

        return $totalPerempuan;
    }

    public function totalBalita() {
        $now = Carbon::now();
        $fiveYearsAgo = $now->subYears(5);

        $totalBalita = DataPendudukModel::whereRaw('DATEDIFF(CURDATE(), tanggal_lahir) / 365.25 < 5')
                                    ->count();

        return $totalBalita;
    }
    public function totalKanak_kanak() {
        $now = Carbon::now();
        $fiveYearsAgo = $now->subYears(6);
        $fiveYearsAgo = $now->subYears(11);

        $totalKanakkanak = DataPendudukModel::whereRaw('DATEDIFF(CURDATE(), tanggal_lahir) / 365.25 >= 6 AND DATEDIFF(CURDATE(), tanggal_lahir) / 365.25 < 12')
                                ->count();


        return $totalKanakkanak;
    }
    public function totalRemaja() {
        $now = Carbon::now();
        $tenYearsAgo = $now->subYears(12);
        $twentyYearsAgo = $now->subYears(25);

        $totalRemaja = DataPendudukModel::whereRaw('DATEDIFF(CURDATE(), tanggal_lahir) / 365.25 >= 12 AND DATEDIFF(CURDATE(), tanggal_lahir) / 365.25 < 25')
                                     ->count();

        return $totalRemaja;
    }

    public function totalDewasa()
    {
        $now = Carbon::now();
        $twentyYearsAgo = $now->subYears(20);
        $sixtyYearsAgo = $now->subYears(50);

        $totalDewasa = DataPendudukModel::whereRaw('DATEDIFF(CURDATE(), tanggal_lahir) / 365.25 >= 26 AND DATEDIFF(CURDATE(), tanggal_lahir) / 365.25 < 45')
                                        ->count();

        return $totalDewasa;
    }
    public function totalLansia()
    {
        $now = Carbon::now();
        $twentyYearsAgo = $now->subYears(45);
        $sixtyYearsAgo = $now->subYears(60);

        $totalLansia = DataPendudukModel::whereRaw('DATEDIFF(CURDATE(), tanggal_lahir) / 365.25 >= 45 AND DATEDIFF(CURDATE(), tanggal_lahir) / 365.25 < 100')
                                        ->count();

        return $totalLansia;
    }

    public function kegiatanDatang() {
        $kegiatan = KegiatanModel::orderBy('tanggal', 'desc')->get();
        return $kegiatan;
    }

}
