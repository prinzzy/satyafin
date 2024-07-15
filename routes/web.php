<?php

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

Route::get('/', function () {
    return view('home');
});
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
    Route::group(['prefix' => 'components', 'as' => 'components.'], function () {
        Route::get('/alert', function () {
            return view('admin.component.alert');
        })->name('alert');
        Route::get('/accordion', function () {
            return view('admin.component.accordion');
        })->name('accordion');
    });
});
Route::get('/layanan', function () {
    return view('layanan.layanan');
})->name('layanan');
Route::get('/consulting', function () {
    return view('layanan.consulting');
})->name('consulting');
Route::get('/flowchart', function () {
    return view('layanan.flowchart');
})->name('flowchart');
Route::get('/report', function () {
    return view('layanan.report');
})->name('report');
Route::get('/pembayaran', function () {
    return view('layanan.pembayaran');
})->name('pembayaran');
