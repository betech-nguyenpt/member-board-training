<?php

namespace Modules\Admin\Providers;

use Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class AdminServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }

    public function provides(): array
    {
        return [];
    }

    private function registerConfig(): void
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('admin.php')
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'admin'
        );
    }

    private function registerFactories(): void
    {
        if (! $this->app->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(__DIR__ . '/../database/factories');
        }
    }

    private function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/admin');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'admin');
        } else {
            $this->loadTranslationsFrom(__DIR__  .'/../resources/lang', 'admin');
        }
    }

    private function registerViews(): void
    {
        $viewPath = resource_path('views/modules/admin');

        $sourcePath = __DIR__ . '/../resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ], 'views');

        $this->loadViewsFrom(array_merge(array_map(static function ($path) {
            return "{$path}/modules/admin";
        }, Config::get('view.paths')), [$sourcePath]), 'admin');
    }
}
