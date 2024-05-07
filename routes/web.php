<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\message;

Route::get('/', function () {
    return view('welcome');
});

Route::post('message', [message::class, 'messagePost'])->name('messagePost');
Route::get('message', [message::class, 'messageGet'])->name('messageGet');

Route::get('welcome', [message::class, 'welcomeGet'])->name('welcomeGet');
Route::post('welcome', [message::class, 'welcomePost'])->name('welcomePost');

Route::get('events', [message::class, 'eventsGet'])->name('eventsGet');
Route::post('events', [message::class, 'eventsPost'])->name('eventsPost');

Route::get('registration', [message::class, 'registrationGet'])->name('registrationGet');
Route::post('registration', [message::class, 'registrationPost'])->name('registrationPost');

Route::get('admin', [message::class, 'adminGet'])->name('adminGet');
Route::post('admin', [message::class, 'adminPost'])->name('adminPost');

Route::get('adminPage', [message::class, 'adminPage'])->name('adminPage');
Route::post('adminPage', [message::class, 'adminPagePost'])->name('adminPagePost');

Route::get('/download/{id}', [message::class, 'downloadImage'])->name('download.image');
