<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\RedirectIfNotAdmin;
use app\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{

    protected $routeMiddleware = [
        // Other middlewares...
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::middlewareGroup('admin', [
            RedirectIfNotAdmin::class,
        ]);
        app('router')->aliasMiddleware('admin', RedirectIfNotAdmin::class);
    }
}
