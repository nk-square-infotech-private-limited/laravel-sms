# laravel-sms
Laravel wrapper for Nksquare/Sms library

## Installation
Add the following lines to your composer.json file
```
....
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/nk-square/laravel-sms.git"
    },
    {
        "type": "git",
        "url": "https://github.com/nk-square/sms.git"
    },
.....
```
Run composer
```
composer require nksquare/laravel-sms
```
Publish config file
```
php artisan vendor:publish --provider="Nksquare\LaravelSms\Providers\SmsServiceProvider" --tag="laravel-sms"
```
Currently supported driver is textlocal. Add the textlocal credentials to your .env fle
```
TEXTLOCAL_APIKEY=your_api_key
TEXTLOCAL_SENDER=your_sender
```
## Usage
```php
use Sms;
use Nksquare\LaravelSms\Message;

$message = new Message();
$message->setRecipient('1234567890');
$message->setMessage('foo bar');
Sms::send($message);
```
