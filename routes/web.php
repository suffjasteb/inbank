<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\Controller;


Route::middleware('auth')->group(function () {



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/deposit', [TransactionController::class, 'deposit'])->name('topup');
    Route::post('/deposit', [TransactionController::class, 'saveDeposit'])->name('saveDeposit');
    Route::get('/withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');
    Route::post('/withdraw', [TransactionController::class, 'saveWithdraw'])->name('saveWithdraw');
    Route::get('/transfer', [TransferController::class, 'transfer'])->name('transfer');
    Route::post('/transfer', [TransferController::class, 'saveTransfer'])->name('saveTransfer');
    Route::get('transaction', [TransactionController::class, 'history'])->name('history');
});




require __DIR__.'/auth.php';
