<?php

namespace BoxPayment;

use Illuminate\Support\ServiceProvider;

/**
 * Class PasswordServiceProvider
 */
class BoxServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('createAddress', CreateAddress::class);
    }
}
