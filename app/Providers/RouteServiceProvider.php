<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = '';

    public function boot()
    {
        $this->routes(function () {
            Route::prefix('')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
        });
    }
}
