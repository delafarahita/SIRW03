<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
