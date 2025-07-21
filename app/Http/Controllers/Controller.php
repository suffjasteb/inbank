<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


 class Controller 
{
    //
        public function index() {
        $balance = $this->getBalance();
        return view('home', compact('balance'));
    }

      public function getBalance() {
        $user = auth()->user(); // Ambil User yang sedang login
        if ($user) {
            return $user->balance;
        } else {
            return 0; // Jika user tidak ditemukan, kembalikan saldo 0
        }
    }
}
