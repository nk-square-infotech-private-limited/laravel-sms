<?php

namespace Nksquare\LaravelSms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for the SMS provider
 */
class Sms extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'nksquare.sms';
    }
}
