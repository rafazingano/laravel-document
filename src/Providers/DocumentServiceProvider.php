<?php

namespace ConfrariaWeb\Document\Providers;

use Illuminate\Support\ServiceProvider;

class DocumentServiceProvider extends ServiceProvider {

    public function boot() {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../databases/Migrations');
        $this->publishes([__DIR__ . '/../../config/cw_document.php' => config_path('cw_document.php')], 'config');
    }

    public function register() {

    }

}
