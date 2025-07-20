<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/tes', function() {
    return response()->json([
        "message" => "top up berhasil",
        "balance" => 1000000
    ]);
});