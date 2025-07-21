<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [Controller::class, 'index'])->name('home');
    // tampilin halaman form
    Route::get('/deposit', [TransactionController::class, 'deposit'])->name('topup');
    // proses deposit
    Route::post('/deposit', [TransactionController::class, 'saveDeposit'])->name('saveDeposit');
    // wd
    Route::get('/withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');
    Route::post('/withdraw', [TransactionController::class, 'saveWithdraw'])->name('saveWithdraw');
    // Transfer
    Route::get('/transfer', [TransferController::class, 'transfer'])->name('transfer');
    Route::post('/transfer', [TransferController::class, 'saveTransfer'])->name('saveTransfer');
    // history transaksi user
    Route::get('transaction', [TransactionController::class, 'history'])->name('history');
});




require __DIR__.'/auth.php';
