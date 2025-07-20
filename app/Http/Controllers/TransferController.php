<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    //
    public function transfer() {
        return view('user.transfer');
    }

    public function saveTransfer(Request $request) {
        $request->validate([
            'amount' => 'required|numeric|min:100000',
        ]);


        $amount = $request->input('amount');
        $user = auth()->user(); // Ambil User yang sedang login alias ngirim

        // cari penerima berdasarkan email atau username
        $recipient = User::where('email', $request->recipient)
            ->orWhere('username', $request->recipient)
            ->first();

            if (!$recipient) {
                return redirect()->back()->withErrors(['recipient' => 'Penerima tidak ditemukan.']);
            }

        if ($user->balance < $amount) {
            return redirect()->back()->withErrors(['amount' => 'Saldo tidak cukup untuk melakukan transfer.']);
        }

        if ($recipient->id === $user->id) {
            return redirect()->back()->withErrors(['recipient' => 'Anda tidak dapat mentransfer ke akun Anda sendiri.']);
        }

        // Proses transfer
        $user->balance -= $amount;
        $recipient->balance += $amount;

        // Catat transaksi keluar
        Transaction::create([
            'user_id' => $user->id,
            'type' => 'transfer_out',
            'amount' => $amount,
            'to_user_id' => $recipient->id,
        ]);


        // Catat transaksi masuk untuk penerima
        Transaction::create([
            'user_id' => $recipient->id, // penerima,
            'type' => 'transfer_in',
            'amount' => $amount,
            'to_user_id' => $user->id,
        ]);

        $user->save();
        $recipient->save();
        return redirect()->route('transfer.success')->with('success', 'Transfer berhasil dilakukan.');
    }
}
