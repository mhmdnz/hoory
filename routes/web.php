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
Route::middleware(['verified', 'check.wallet', 'auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/wallet', function () {
        return view('wallet');
    })->name('wallet.show');

    Route::get('/wallet/new', [App\Http\Controllers\WalletController::class, 'show'])
        ->name('wallet.add.show');

    Route::post('/wallet/new', [\App\Http\Controllers\WalletController::class, 'create'])
        ->name('wallet.add.create');

    Route::get('/wallet/balance/{wallet}', [\App\Http\Controllers\WalletController::class, 'balance'])
        ->name('wallet.balance');

    Route::post('/transaction/{wallet}', [\App\Http\Controllers\TransactionController::class, 'create'])
        ->name('transaction.new');
});

require __DIR__.'/auth.php';
