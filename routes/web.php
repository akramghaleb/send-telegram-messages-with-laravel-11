<?php

use App\Http\Controllers\TelegramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-message', [TelegramController::class , 'sendMessage'])->name('sendMessage');

Route::get('/get-updates', [TelegramController::class,'getUpdates'])->name('getUpdates');
