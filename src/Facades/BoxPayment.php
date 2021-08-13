<?php

namespace boxpayment\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class Boxpayment extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'boxpayment';
    }
} 
