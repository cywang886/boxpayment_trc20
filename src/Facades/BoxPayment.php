 
<?php

namespace BoxPayment\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class BoxPayment extends Facade
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
