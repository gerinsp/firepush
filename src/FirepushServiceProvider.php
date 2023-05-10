<?php

namespace Sena\Firepush;

use Illuminate\Support\ServiceProvider;

class FirepushServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/firepush.php' => config_path('firepush.php'),
        ], 'firepush-config');
    }


    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/firepush.php', 'firepush');
    }
}
