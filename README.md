<img src="https://media.dev.to/dynamic/image/width=1000,height=420,fit=cover,gravity=auto,format=auto/https%3A%2F%2Fdev-to-uploads.s3.amazonaws.com%2Fuploads%2Farticles%2F979iqvt3nsjjg5rjifh8.png" style="aspect-ratio: auto 1000 / 420;" width="1000" height="420" class="crayons-article__cover__image" alt="Cover image for How to Create a Telegram Bot and Send Messages Using Laravel 11">

# How to Create a Telegram Bot and Send Messages Using Laravel 11

In this blog we will discover how to create a Telegram bot and seamlessly integrate it with Laravel 11 in this comprehensive guide. Learn step-by-step instructions on obtaining your API token, setting up the irazasyed/telegram-bot-sdk, and sending messages directly to your bot. Whether you're a beginner or an experienced developer, this tutorial provides all the essential information you need to enhance your applications with Telegram's messaging capabilities. Start building interactive and engaging experiences for your users today!

## Step 1: Create Your Telegram Bot

1. **Open Telegram**: Launch the Telegram app on your device or access the web version.

2. **Find the BotFather**: In the search bar, type `@BotFather` and select the official BotFather bot. This bot is responsible for creating and managing other bots.

3. **Start a Chat**: Click on the "Start" button or type `/start` to initiate the conversation with BotFather.

4. **Create a New Bot**: Use the command `/newbot` to create a new bot. BotFather will ask you to choose a name and a username for your bot:
   - **Name**: This is the display name of your bot (e.g., "My Awesome Bot").
   - **Username**: This must be unique and should end with the word "bot" (e.g., "myawesome_bot").

5. **Get Your API Token**: Once your bot is created, BotFather will provide you with an API token. It looks something like this:
    
    Example:
    ```plaintext
    123456789:ABCdefGhIJKlmNoPQRstUvWxYz1234567890
    ```

    Save this token, as you will need it to connect your Laravel application to your bot.

## Step 2: Set Up Laravel 11

### 2.1 Create a new laravel project

Creating a new project by running the following command:
```
composer create-project laravel/laravel laravel-telegram-bot
```
### 2.2 Install the Telegram Bot SDK

Next, install the `irazasyed/telegram-bot-sdk` package using Composer:
```
composer require irazasyed/telegram-bot-sdk
```

### 2.3 Configure the SDK

After installing the SDK, publish the configuration file:
```
php artisan vendor:publish --tag="telegram-config"
```

This command creates a configuration file located at config/telegram.php.

### 2.4 Set the Bot Token in `.env`

Open your `.env` file and add your Telegram bot token:
```
TELEGRAM_BOT_TOKEN=123456789:ABCdefGhIJKlmNoPQRstUvWxYz1234567890
```

## Step 3: Sending a Message to Your Bot

Now that your bot is set up and configured, let's create a route to send messages to your bot.

### 3.1 Create a Route

Open the `routes/web.php` file and add the following route:
```php
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/send-message', function () {
    $chatId = 'YOUR_CHAT_ID'; // Replace with your chat ID
    $message = 'Hello, this is a message from Laravel!';

    Telegram::sendMessage([
        'chat_id' => $chatId,
        'text' => $message,
    ]);

    return 'Message sent to Telegram!';
});
```

### 3.2 Get Your Chat ID

To send messages to your chat, you need to know your `chat_id`. To find this, you can use the getUpdates method.

Add another route to `routes/web.php`:
```php
Route::get('/get-updates', function () {
    $updates = Telegram::getUpdates();
    return $updates;
});

```

### 3.3 Test Sending a Message

Now, visit http://127.0.0.1:8000/send-message in your browser, replacing 127.0.0.1:8000 with your actual application URL. You should see a message saying "Message sent to Telegram!" and receive the message in your Telegram chat.

## Conclusion

You’ve successfully created a Telegram bot, obtained an API token, and integrated it into your Laravel 11 application using the irazasyed/telegram-bot-sdk. Now you can build more complex interactions with your bot or expand its capabilities.

For further exploration, consider adding features like handling incoming messages, setting up command handlers, or integrating with other services. The possibilities with Telegram bots are endless!
