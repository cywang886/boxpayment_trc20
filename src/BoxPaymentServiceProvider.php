<?php
namespace boxpayment\laravel;

use Illuminate\Support\ServiceProvider;

class BoxPaymentServiceProvider extends ServiceProvider
{
      /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('boxpayment.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/Routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'config'
        );

        $this->app->bind('boxpayment', function ($app) {
            return new BoxPayment($app);
        });

        $this->app->alias('boxpayment', BoxPayment::class);
    }
}
