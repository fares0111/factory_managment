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
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
 public const HOME = '/index';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

                Route::middleware('web')
                ->group(base_path('routes/Suppliers.php'));

                Route::middleware('web')
                ->group(base_path('routes/Clints.php'));

                Route::middleware('web')
                ->group(base_path('routes/Finance.php'));


                Route::middleware('web')
                ->group(base_path('routes/Statics.php'));

                Route::middleware('web')
                ->group(base_path('routes/Washer.php'));

                Route::middleware('web')
                ->group(base_path('routes/Fabrics.php'));

                Route::middleware('web')
                ->group(base_path('routes/Admin.php'));

                Route::middleware('web')
                ->group(base_path('routes/Super_Admin.php'));

                Route::middleware('web')
                ->group(base_path('routes/Human_resources.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
