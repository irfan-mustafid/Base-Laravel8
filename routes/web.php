<?php

use App\Http\Controllers\Dashboard;
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

Route::group(['prefix' => 'welcome', 'as' => 'welcome.'], function () {
    Route::get('/', [Dashboard::class, 'index']);
    // Route::get('/get', [Dashboard::class, 'get'])->name('get');
    // Route::post('/simpan', [Dashboard::class, 'simpan'])->name('simpan');
    // Route::post('/hapus', [Dashboard::class, 'hapus'])->name('hapus');
});

// Route::get('/dashboard', function () {
//     // return view('content/dashboard');
// });
