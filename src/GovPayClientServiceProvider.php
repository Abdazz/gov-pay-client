<?php

namespace Abdazz\GovPayClient;

use Illuminate\Support\ServiceProvider;

class GovPayClientServiceProvider extends ServiceProvider
{


    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'govpay');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->publishes([
            __DIR__.'/../config/govpayclient.php' => config_path('payement.php'),
        ]);

    }


    public function register(): void
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'govpay');

    }


}
