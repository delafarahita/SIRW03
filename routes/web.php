<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\KegiatanController;

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

Route::group(['prefix'=>'dashboard'], function(){
    Route::get('/', function () {
        $activeMenu = 'dashboard';

        return view('admin.dashboard.index',[
            'activeMenu' => $activeMenu]);
    });
});

Route::group(['prefix' => 'DataPenduduk'], function(){
    Route::get('/', [DataPendudukController::class, 'index']);
    Route::post('/list', [DataPendudukController::class, 'list']);
    Route::get('/create', [DataPendudukController::class, 'create']);
    Route::post('/', [DataPendudukController::class, 'store']);
    Route::get('/{id}', [DataPendudukController::class, 'show']);
    Route::get('/{id}/edit', [DataPendudukController::class, 'edit']);
    Route::put('/{id}', [DataPendudukController::class, 'update']);
    Route::delete('/{id}', [DataPendudukController::class, 'destroy']);
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

Route::prefix('keluhan')->group(function () {
    Route::get('/', [KeluhanController::class, 'index'])->name('keluhan.index');
    Route::get('/create', [KeluhanController::class, 'create'])->name('keluhan.create');
    Route::post('/store', [KeluhanController::class, 'store'])->name('keluhan.store');
    Route::get('/{id}', [KeluhanController::class, 'show'])->name('keluhan.show');
    Route::get('/{id}/reply', [KeluhanController::class, 'replyForm'])->name('keluhan.replyForm');
    Route::post('/{id}/reply', [KeluhanController::class, 'reply'])->name('keluhan.reply');
});

Route::group(['prefix' => 'Kegiatan'], function(){
    Route::get('/', [KegiatanController::class, 'index']);
    Route::post('/list', [KegiatanController::class, 'list']);
    Route::get('/create', [KegiatanController::class, 'create']);
    Route::post('/', [KegiatanController::class, 'store']);
    Route::get('/{id}', [KegiatanController::class, 'show']);
    Route::get('/{id}/edit', [KegiatanController::class, 'edit']);
    Route::put('/{id}', [KegiatanController::class, 'update']);
    Route::delete('/{id}', [KegiatanController::class, 'destroy']);
});
