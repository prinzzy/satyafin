<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\TransactionAdminController;

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

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/', function () {
    return view('home');
});
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
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
Route::get('/bank-transfer-info', function () {
    return view('layanan.bank-transfer-info');
})->name('bank-transfer-info');

Route::post('/store-payment-proof', [TransactionController::class, 'storePaymentProof'])->name('store.payment.proof');





Route::prefix('admin')->group(function () {
    Route::get('/transactions', [TransactionAdminController::class, 'index'])->name('admin.transactions.index');
    Route::post('/transactions/store', [TransactionAdminController::class, 'store'])->name('admin.transactions.store');
    Route::put('/transactions/{transaction}', [TransactionAdminController::class, 'update'])->name('admin.transactions.update');
    Route::delete('/transactions/{transaction}', [TransactionAdminController::class, 'destroy'])->name('admin.transactions.destroy');
    // Tambahkan route lain sesuai kebutuhan
});


Route::post('/admin/transactions/update-status', [TransactionAdminController::class, 'updateStatus'])->name('admin.transactions.update-status');
