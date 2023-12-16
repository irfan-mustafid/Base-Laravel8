<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Detail;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\RouteGroup;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', [Dashboard::class, 'index']);
    Route::get('/getDataJaminan', [Dashboard::class, 'getDataJaminan'])->name('getDataJaminan');
    Route::post('/simpan', [Dashboard::class, 'simpan'])->name('simpan');
    Route::get('/getEditDetail/{id}', [Dashboard::class, 'getEditDetail'])->name('getEditDetail');
});

// Route::group(['prefix' => 'detail', 'as' => 'detail.'], function () {
//     // Route::get('/', [Detail::class, 'index']);
//     Route::get('/projects/display/{id}'
// });

// Route::get('/dashboard', function () {
//     // return view('content/dashboard');
// });
