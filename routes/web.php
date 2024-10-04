<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-message', function () {
    $chatId = '5507433802'; // Replace with your chat ID
    $message = 'Hello, this is a message from Laravel!';

    Telegram::sendMessage([
        'chat_id' => $chatId,
        'text' => $message,
    ]);

    return 'Message sent to Telegram!';
});

Route::get('/get-updates', function () {
    $updates = Telegram::getUpdates();
    return $updates;
});
