<?php

declare(strict_types=1);

namespace Wijzijnweb\LaravelBsnValidator;

use Illuminate\Support\ServiceProvider;

class LaravelBsnValidatorServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LaravelBsnValidator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'laravel-bsn-validator');

        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/laravel-bsn-validator'),
        ], ['laravel-bsn-validator', 'laravel-bsn-validator-lang']);
    }
}
