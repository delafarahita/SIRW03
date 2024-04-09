<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataPendudukController;

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
