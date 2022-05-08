<?php

declare(strict_types = 1);

namespace MartinRo\UiComponents;

use Illuminate\Support\ServiceProvider;

class UiComponentsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ui');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/ui'),
        ]);
    }
}
