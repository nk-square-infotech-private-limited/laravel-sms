<?php

namespace Nksquare\LaravelSms\Providers;

use Illuminate\Support\ServiceProvider;
use Nksquare\Sms\Client;
use Nksquare\Sms\Drivers\DriverInterface;
use Nksquare\Sms\Drivers\Textlocal;
use Nksquare\LaravelSms\Exceptions\DriverNotFoundException;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DriverInterface::class, function ($app) {
            $config = $app->config;
            switch ($config['sms.default']) {
                case 'textlocal':
                    $driver = new Textlocal([
                        'apikey' => $config['sms.drivers.textlocal.apikey'],
                        'sender' => $config['sms.drivers.textlocal.sender'],
                    ]);
                    break;
                
                default:
                    throw new DriverNotFoundException();
                    break;
            }
            return new Client($driver);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ .'/../config/sms.php', 'laravel-sms');

        $this->publishes([
            __DIR__.'/../config/sms.php' => config_path('sms.php')
        ],'laravel-sms');
    }
}
