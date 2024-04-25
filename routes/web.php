<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\message;

Route::get('/', function () {
<<<<<<< HEAD
    return view('welcome');
=======
    return view('message');
>>>>>>> 06e04488236b8178da2f959b44205e0df2a21413
});

Route::post('message', [message::class, 'messagePost'])->name('messagePost');
Route::get('message', [message::class, 'messageGet'])->name('messageGet');
<<<<<<< HEAD

Route::get('welcome', [message::class, 'welcomeGet'])->name('welcomeGet');
Route::post('welcome', [message::class, 'welcomePost'])->name('welcomePost');

Route::get('events', [message::class, 'eventsGet'])->name('eventsGet');
Route::post('events', [message::class, 'eventsPost'])->name('eventsPost');

Route::get('registration', [message::class, 'registrationGet'])->name('registrationGet');
Route::post('registration', [message::class, 'registrationPost'])->name('registrationPost');
=======
>>>>>>> 06e04488236b8178da2f959b44205e0df2a21413
