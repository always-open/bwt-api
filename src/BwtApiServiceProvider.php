<?php

namespace AlwaysOpen\BwtApi;

use Illuminate\Support\ServiceProvider;

class BwtApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bwt-api.php', 'bwt-api');

        $this->app->singleton(BwtApiClient::class, function ($app) {
            return new BwtApiClient(
                config('bwt-api.base_url'),
                config('bwt-api.api_key'),
                config('bwt-api.timeout'),
            );
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/bwt-api.php' => config_path('bwt-api.php'),
            __DIR__.'/../config/data.php' => config_path('data.php'),
        ], 'config');
    }
}
