<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\message;

Route::get('/', function () {
    return view('message');
});

Route::post('message', [message::class, 'messagePost'])->name('messagePost');
Route::get('message', [message::class, 'messageGet'])->name('messageGet');
