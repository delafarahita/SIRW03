<?php
use App\Http\Controllers\ExportController;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataAlternatifController;
use App\Http\Controllers\DataKriteriaController;
use App\Http\Controllers\MOORAController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PinjamInventarisController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KKController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\BantuanSosialController;
use App\Http\Controllers\DataPenilaianController;
use App\Http\Controllers\DataPerhitunganController;
use App\Http\Controllers\KategoriDagangController;
use App\Http\Controllers\KategoriJasaController;
use App\Http\Controllers\KategoriUmkmController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix'=>'login'], function(){
    Route::get('/', [LoginController::class, 'index'])->name('login');
});

// LOGIN
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');


Route::group(['middleware' => ['auth']], function (){
    Route::group(['middleware' => ['cek_login:1,2']  , 'prefix'=>'admin'], function(){
        Route::get('/dashboard', function () {
            $activeMenu = 'dashboard';
            $dropdown = 'false';
            $page = (object) [
                'title' => 'Dashboard',
            ];

            return view('admin.dashboard.index',[
                'activeMenu' => $activeMenu,
                'dropdown' => $dropdown,
                'page' => $page,
            ]);
        })->name('dashboard');

        Route::group(['prefix' => 'data_penduduk'], function(){
            Route::get('/', [DataPendudukController::class, 'index'])->name('data_penduduk.index');
            Route::post('/list', [DataPendudukController::class, 'list'])->name('data_penduduk.list');
            Route::get('/create', [DataPendudukController::class, 'create'])->name('data_penduduk.create');;
            Route::post('/', [DataPendudukController::class, 'store'])->name('data_penduduk.store');
            Route::get('/{id}', [DataPendudukController::class, 'show'])->name('data_penduduk.show');
            Route::get('/{id}/edit', [DataPendudukController::class, 'edit'])->name('data_penduduk.edit');
            Route::put('/{id}', [DataPendudukController::class, 'update'])->name('data_penduduk.update');
            Route::delete('/{id}', [DataPendudukController::class, 'destroy'])->name('data_penduduk.destroy');
        });

        Route::group(['prefix' => 'data_kk'], function(){
            Route::get('/', [KKController::class, 'index'])->name('data_kk.index');
            Route::post('/list', [KKController::class, 'list'])->name('data_kk.list');
            Route::get('/create', [KKController::class, 'create'])->name('data_kk.create');
            Route::post('/', [KKController::class, 'store'])->name('data_kk.store');
            Route::get('/{id}', [KKController::class, 'show'])->name('data_kk.show');
            Route::get('/{id}/edit', [KKController::class, 'edit'])->name('data_kk.edit');
            Route::put('/{id}', [KKController::class, 'update'])->name('data_kk.update');
            Route::delete('/{id}', [KKController::class, 'destroy'])->name('data_kk.destroy');
        });

        Route::group(['prefix' => 'data_rt'], function(){
            Route::get('/', [RTController::class, 'index'])->name('data_rt.index');
            Route::post('/list', [RTController::class, 'list'])->name('data_rt.list');
            Route::get('/create', [RTController::class, 'create'])->name('data_rt.create');
            Route::post('/', [RTController::class, 'store'])->name('data_rt.store');
            Route::get('/{id}', [RTController::class, 'show'])->name('data_rt.show');
            Route::get('/{id}/edit', [RTController::class, 'edit'])->name('data_rt.edit');
            Route::put('/{id}', [RTController::class, 'update'])->name('data_rt.update');
            Route::delete('/{id}', [RTController::class, 'destroy'])->name('data_rt.destroy');
        });

        Route::group(['prefix' => 'bantuan_sosial'], function(){
            Route::get('/', [BantuanSosialController::class, 'index'])->name('bantuan_sosial.index');
        });

        Route::group(['prefix' => 'data_kriteria'], function(){
            Route::get('/', [DataKriteriaController::class, 'index'])->name('data_kriteria.index');
            Route::post('/list', [DataKriteriaController::class, 'list'])->name('data_kriteria.list');
            Route::get('/create', [DataKriteriaController::class, 'create'])->name('data_kriteria.create');
            Route::post('/', [DataKriteriaController::class, 'store'])->name('data_kriteria.store');
            Route::get('/{id}', [DataKriteriaController::class, 'show'])->name('data_kriteria.show');
            Route::get('/{id}/edit', [DataKriteriaController::class, 'edit'])->name('data_kriteria.edit');
            Route::put('/{id}', [DataKriteriaController::class, 'update'])->name('data_kriteria.update');
            Route::delete('/{id}', [DataKriteriaController::class, 'destroy'])->name('data_kriteria.destroy');
        });

        Route::group(['prefix' => 'data_alternatif'], function(){
            Route::get('/', [DataAlternatifController::class, 'index'])->name('data_alternatif.index');
            Route::post('/list', [DataAlternatifController::class, 'list'])->name('data_alternatif.list');
            Route::get('/create', [DataAlternatifController::class, 'create'])->name('data_alternatif.create');
            Route::post('/', [DataAlternatifController::class, 'store'])->name('data_alternatif.store');
            Route::get('/{id}', [DataAlternatifController::class, 'show'])->name('data_alternatif.show');
            Route::get('/{id}/edit', [DataAlternatifController::class, 'edit'])->name('data_alternatif.edit');
            Route::put('/{id}', [DataAlternatifController::class, 'update'])->name('data_alternatif.update');
            Route::delete('/{id}', [DataAlternatifController::class, 'destroy'])->name('data_alternatif.destroy');
        });

        Route::group(['prefix' => 'data_penilaian'], function(){
            Route::get('/', [DataPenilaianController::class, 'index'])->name('data_penilaian.index');
            Route::post('/list', [DataPenilaianController::class, 'list'])->name('data_penilaian.list');
            Route::get('/{id}/create', [DataPenilaianController::class, 'create'])->name('data_penilaian.create');
            Route::post('/', [DataPenilaianController::class, 'store'])->name('data_penilaian.store');
            Route::get('/{id}', [DataPenilaianController::class, 'show'])->name('data_penilaian.show');
            Route::get('/{id}/edit', [DataPenilaianController::class, 'edit'])->name('data_penilaian.edit');
            Route::put('/{id}', [DataPenilaianController::class, 'update'])->name('data_penilaian.update');
            Route::delete('/{id}', [DataPenilaianController::class, 'destroy'])->name('data_penilaian.destroy');
        });

        Route::group(['prefix' => 'data_perhitungan'], function(){
            Route::get('/', [DataPerhitunganController::class, 'index'])->name('data_perhitungan.index');
            Route::post('/list', [DataPerhitunganController::class, 'list'])->name('data_perhitungan.list');
            Route::get('/{id}/create', [DataPerhitunganController::class, 'create'])->name('data_perhitungan.create');
            Route::post('/', [DataPerhitunganController::class, 'store'])->name('data_perhitungan.store');
            // Route::get('/{id}', [DataPerhitunganController::class, 'show'])->name('data_perhitungan.show');
            Route::get('/{id}/edit', [DataPerhitunganController::class, 'edit'])->name('data_perhitungan.edit');
            Route::put('/{id}', [DataPerhitunganController::class, 'update'])->name('data_perhitungan.update');
            Route::delete('/{id}', [DataPerhitunganController::class, 'destroy'])->name('data_perhitungan.destroy');
        });

        Route::get('/data_perhitungan/moora', [MOORAController::class, 'index'])->name('data_perhitungan.moora');

        Route::group(['prefix' => 'umkm'], function(){
            Route::get('/', [UmkmController::class, 'index'])->name('umkm.index');
            Route::get('/create', [UmkmController::class, 'create'])->name('umkm.create');
            Route::post('/', [UmkmController::class, 'store'])->name('umkm.store');
            Route::get('/{id}', [UmkmController::class, 'show'])->name('umkm.show');
            Route::get('/{id}/edit', [UmkmController::class, 'edit'])->name('umkm.edit');
            Route::put('/{id}', [UmkmController::class, 'update'])->name('umkm.update');
            Route::delete('/{id}', [UmkmController::class, 'destroy'])->name('umkm.destroy');
        });


        Route::group(['prefix' => 'kegiatan'], function(){
            Route::get('/', [KegiatanController::class, 'index'])->name('kegiatan.index');
            Route::post('/list', [KegiatanController::class, 'list'])->name('kegiatan.list');;
            Route::get('/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
            Route::post('/', [KegiatanController::class, 'store'])->name('kegiatan.store');
            Route::get('/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show');
            Route::get('/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
            Route::put('/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
            Route::delete('/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
        });

        Route::group(['prefix' => 'inventaris'], function(){
            Route::get('/', [InventarisController::class, 'index'])->name('inventaris.index');
            Route::post('/list', [InventarisController::class, 'list']);
            Route::get('/create', [InventarisController::class, 'create']);
            Route::post('/', [InventarisController::class, 'store']);
            Route::get('/{id}', [InventarisController::class, 'show']);
            Route::get('/{id}/edit', [InventarisController::class, 'edit']);
            Route::put('/{id}', [InventarisController::class, 'update'])->name('inventaris.update');
            Route::delete('/{id}', [InventarisController::class, 'destroy']);
        });

        Route::group(['prefix'=>'pinjam'],function(){
            Route::get('/create', [InventarisController::class, 'createPinjam']);
            Route::post('/', [InventarisController::class, 'storePinjam']);
            Route::get('/{id}/edit', [InventarisController::class, 'editPinjam']);
            Route::put('/{id}', [InventarisController::class, 'updatePinjam']);
            Route::delete('/{id}', [InventarisController::class, 'destroyPinjam']);
        });

        Route::group(['prefix' => 'kas'], function(){
            Route::get('/', [KasController::class, 'index'])->name('kas.index');
            Route::post('/list', [KasController::class, 'list'])->name('kas.list');
            Route::get('/create', [KasController::class, 'create'])->name('kas.create');
            Route::post('/', [KasController::class, 'store'])->name('kas.store');
            Route::get('/{id}', [KasController::class, 'show'])->name('kas.show');
            Route::get('/{id}/edit', [KasController::class, 'edit'])->name('kas.edit');
            Route::put('/{id}', [KasController::class, 'update'])->name('kas.update');
            Route::delete('/{id}', [KasController::class, 'destroy'])->name('kas.destroy');
        });
        Route::group(['prefix' => 'kategori_dagang'], function(){
            Route::get('/', [KategoriDagangController::class, 'index'])->name('kategori_dagang.index');
            Route::post('/list', [KategoriDagangController::class, 'list'])->name('kategori_dagang.list');
            Route::get('/create', [KategoriDagangController::class, 'create'])->name('kategori_dagang.create');
            Route::post('/', [KategoriDagangController::class, 'store'])->name('kategori_dagang.store');
            Route::get('/{id}', [KategoriDagangController::class, 'show'])->name('kategori_dagang.show');
            Route::get('/{id}/edit', [KategoriDagangController::class, 'edit'])->name('kategori_dagang.edit');
            Route::put('/{id}', [KategoriDagangController::class, 'update'])->name('kategori_dagang.update');
            Route::delete('/{id}', [KategoriDagangController::class, 'destroy'])->name('kategori_dagang.destroy');
        });

        Route::group(['prefix' => '/keluhan'], function () {
            Route::get('/', [KeluhanController::class, 'index'])->name('keluhan.index');
            Route::get('/list', [KeluhanController::class, 'list'])->name('keluhan.list');
            Route::get('/create', [KeluhanController::class, 'create'])->name('keluhan.create');
            Route::get('/{id}', [KeluhanController::class, 'show'])->name('keluhan.show');
        });

        Route::group(['prefix' => 'kategori_jasa'], function(){
            Route::get('/', [KategoriJasaController::class, 'index'])->name('kategori_jasa.index');
            Route::post('/list', [KategoriJasaController::class, 'list'])->name('kategori_jasa.list');
            Route::get('/create', [KategoriJasaController::class, 'create'])->name('kategori_jasa.create');
            Route::post('/', [KategoriJasaController::class, 'store'])->name('kategori_jasa.store');
            Route::get('/{id}', [KategoriJasaController::class, 'show'])->name('kategori_jasa.show');
            Route::get('/{id}/edit', [KategoriJasaController::class, 'edit'])->name('kategori_jasa.edit');
            Route::put('/{id}', [KategoriJasaController::class, 'update'])->name('kategori_jasa.update');
            Route::delete('/{id}', [KategoriJasaController::class, 'destroy'])->name('kategori_jasa.destroy');
        });
    });

    Route::group(['prefix' => 'data_kategori_umkm'], function(){
        Route::get('/', [KategoriUmkmController::class, 'index'])->name('data_kategori_umkm.index');
        Route::post('/list', [KategoriUmkmController::class, 'list'])->name('data_kategori_umkm.list');
        Route::get('/create', [KategoriUmkmController::class, 'create'])->name('data_kategori_umkm.create');
        Route::post('/', [KategoriUmkmController::class, 'store'])->name('data_kategori_umkm.store');
        Route::get('/{id}', [KategoriUmkmController::class, 'show'])->name('data_kategori_umkm.show');
        Route::get('/{id}/edit', [KategoriUmkmController::class, 'edit'])->name('data_kategori_umkm.edit');
        Route::put('/{id}', [KategoriUmkmController::class, 'update'])->name('data_kategori_umkm.update');
        Route::delete('/{id}', [KategoriUmkmController::class, 'destroy'])->name('data_kategori_umkm.destroy');
    });
    Route::get('/export', [ExportController::class, 'exportToExcel'])->name('data_penduduk.export');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::post('/', [KeluhanController::class, 'store'])->name('store_keluhan');


Route::prefix('kas')->group(function () {
    Route::get('/', [KasController::class, 'index'])->name('kas.index');
    Route::get('/create', [KasController::class, 'create'])->name('kas.create');
    Route::post('/', [KasController::class, 'store'])->name('kas.store');
    Route::get('/{kas}/edit', [KasController::class, 'edit'])->name('kas.edit');
    Route::put('/{kas}', [KasController::class, 'update'])->name('kas.update');
    Route::delete('/{kas}', [KasController::class, 'destroy'])->name('kas.destroy');
});
