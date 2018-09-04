<?php

namespace Hety\AliSms;

use Illuminate\Support\ServiceProvider;

class AliSmsProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('config.php'),
        ]);
    }

    public function register()
    {

        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'aliyunsms');

        $this->app->bind(AliSms::class, function() {
            return new AliSms();
        });
    }

    protected function configPath()
    {
        return __DIR__ . '/config/config.php';
    }
}
