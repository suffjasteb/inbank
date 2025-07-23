<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{
    //


    public function deposit() {
        return view('topup');
    }

    public function saveDeposit(Request $request) {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
        ]);
        $amount = $request->input('amount');
        $user = auth()->user();

        $user->balance += $amount; 
        $user->save();

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'topup',
            'amount' => $amount,
            'to_user_id' => null, 
        ])->save();
        return redirect()->route('dashboard')->with('success', 'Topup successful!');
    }

    public function withdraw() {
        return view('withdraw');
    }

    public function saveWithdraw(Request $request) {
        $request->validate([
            'amount' => 'required|numeric|min:100000',
        ]);


        $amount = $request->input('amount');
        $user = auth()->user(); // Ambil User yang sedang login
        if ($user->balance < $amount) {
            return redirect()->back()->with('error', 'Saldo tidak cukup');
        } 
        $user->balance -= $amount; //kurangi saldo
        $user->save();

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'withdraw',
            'amount' => $amount,
            'to_user_id' => null, // karena ini withdraw, tidak ada user tujuan
        ]);
        return redirect()->route('home')->with('success', 'Withdraw successful!');
    }


    public function history() {

        $user = auth()->user();

        $outgoing = $user->transferSent()->with('toUser')->get();
        $incoming = $user->transferReceived()->with('fromUser')->get();

        $transactions = $outgoing->merge($incoming);

        $transactions = $transactions->sortByDesc('created_at'); // Urutkan berdasarkan tanggal terbaru

        return view('history', compact('transactions'));
    }

}

