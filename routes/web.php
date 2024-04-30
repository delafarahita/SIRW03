<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KKController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\BantuanSosialController;
use App\Http\Controllers\KategoriDagangController;

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

Route::group(['prefix'=>'login'], function(){
    Route::get('/', [LoginController::class, 'index'])->name('login');
});

Route::group(['prefix'=>'admin'], function(){
    Route::get('/dashboard', function () {
        $activeMenu = 'dashboard';
        $dropdown = 'false';

        return view('admin.dashboard.index',[
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown
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
        Route::post('/list', [KegiatanController::class, 'list']);
        Route::get('/create', [KegiatanController::class, 'create']);
        Route::post('/', [KegiatanController::class, 'store']);
        Route::get('/{id}', [KegiatanController::class, 'show']);
        Route::get('/{id}/edit', [KegiatanController::class, 'edit']);
        Route::put('/{id}', [KegiatanController::class, 'update']);
        Route::delete('/{id}', [KegiatanController::class, 'destroy']);
    });
    
    Route::group(['prefix' => 'inventaris'], function(){
        Route::get('/', [InventarisController::class, 'index'])->name('inventaris.index');
        Route::post('/list', [InventarisController::class, 'list']);
        Route::get('/create', [InventarisController::class, 'create']);
        Route::post('/', [InventarisController::class, 'store']);
        Route::get('/{id}', [InventarisController::class, 'show']);
        Route::get('/{id}/edit', [InventarisController::class, 'edit']);
        Route::put('/{id}', [InventarisController::class, 'update']);
        Route::delete('/{id}', [InventarisController::class, 'destroy']);
    });
    
    Route::group(['prefix' => 'kas'], function(){
        Route::get('/', [KasController::class, 'index'])->name('kas.index');
        Route::post('/list', [KasController::class, 'list']);
        Route::get('/create', [KasController::class, 'create']);
        Route::post('/', [KasController::class, 'store']);
        Route::get('/{id}', [KasController::class, 'show']);
        Route::get('/{id}/edit', [KasController::class, 'edit']);
        Route::put('/{id}', [KasController::class, 'update']);
        Route::delete('/{id}', [KasController::class, 'destroy']);
    });
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

Route::group(['prefix' => 'kategori_jasa'], function(){
    Route::get('/', [KategoriDagangController::class, 'index'])->name('kategori_jasa.index');
    Route::post('/list', [KategoriDagangController::class, 'list'])->name('kategori_jasa.list');
    Route::get('/create', [KategoriDagangController::class, 'create'])->name('kategori_jasa.create');
    Route::post('/', [KategoriDagangController::class, 'store'])->name('kategori_jasa.store');
    Route::get('/{id}', [KategoriDagangController::class, 'show'])->name('kategori_jasa.show');
    Route::get('/{id}/edit', [KategoriDagangController::class, 'edit'])->name('kategori_jasa.edit');
    Route::put('/{id}', [KategoriDagangController::class, 'update'])->name('kategori_jasa.update');
    Route::delete('/{id}', [KategoriDagangController::class, 'destroy'])->name('kategori_jasa.destroy');
});


Route::get('login', [AuthController::class, 'index'])->name('login');
// Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
// Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function () {
    
    Route::group(['middleware' => 'cek_login:1'], function () {
        Route::resource('admin', RWController::class);
        Route::resource('admin', DataPendudukController::class);
        Route::resource('admin', RWController::class);
        Route::resource('admin', RWController::class);
        Route::resource('admin', RWController::class);
    });
    
    Route::group(['middleware' => 'cek_login:2'], function () {
        Route::resource('admin', RTController::class);
    });
    
});
Route::post('/', [KeluhanController::class, 'store'])->name('store_keluhan');

Route::group(['prefix' => '/keluhan'], function () {
    Route::get('/', [KeluhanController::class, 'index'])->name('keluhan.index');
    Route::get('/list', [KeluhanController::class, 'list'])->name('keluhan.list');
    Route::get('/create', [KeluhanController::class, 'create'])->name('keluhan.create');
    Route::get('/{id}', [KeluhanController::class, 'show'])->name('keluhan.show');
});
