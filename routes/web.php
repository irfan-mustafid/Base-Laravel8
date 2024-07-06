<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Detail;
use App\Http\Controllers\Login;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/', 'as' => 'login.'], function () {
    Route::get('/', [Login::class, 'index'])->name('login')->middleware('guest');
    Route::post('/auth', [Login::class, 'auth'])->name('auth');
    Route::get('/logout', [Login::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'cek_login', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', [Dashboard::class, 'index']);
    Route::get('/getDataJaminan', [Dashboard::class, 'getDataJaminan'])->name('getDataJaminan');
    Route::post('/simpan', [Dashboard::class, 'simpan'])->name('simpan');
    Route::get('/getEditDetail/{id}', [Dashboard::class, 'getEditDetail'])->name('getEditDetail');
});
