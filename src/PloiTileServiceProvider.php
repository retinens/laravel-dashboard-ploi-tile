<?php

namespace Retinens\PloiTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class PloiTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchDataFromPloiApiCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-ploi-tile'),
        ], 'dashboard-ploi-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-ploi-tile');

        Livewire::component('ploi-tile', PloiTileComponent::class);
    }
}
