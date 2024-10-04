<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function sendMessage() {
        $chatId = '1361928373'; // Replace with your chat ID
        $message = 'Hello, this is a message from Laravel!';

        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
        ]);

        return 'Message sent to Telegram!';
    }

    public function getUpdates() {
        $updates = Telegram::getUpdates();
        return $updates;
    }
}
