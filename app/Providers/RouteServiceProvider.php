<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware(['role:super admin|admin|customer support|sales and marketing|accounting and finance,admins'])
                ->prefix('admin-api')
                ->group(base_path('routes/admin/api.php'));

            // Route::middleware(['role:customer'])
            //     ->prefix('customer-api')
            //     ->group(base_path('routes/customer/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
