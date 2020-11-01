<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $websiteNamespace = 'App\Http\Controllers';

    protected $dashboardNamespace = 'App\Http\Controllers\Dashboard';

    protected $apiNamespace = 'App\Http\Controllers\Api';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

        $this->mapWebRoutes();

        $this->mapDashboardRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->websiteNamespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapDashboardRoutes()
    {
        Route::prefix("dashboard")
            ->middleware(["web", "auth", "localize", "admin"])
            ->namespace($this->dashboardNamespace)
            ->group(base_path('routes/dashboard.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware(['localizeApi'])
            ->namespace($this->apiNamespace)
            ->group(base_path('routes/api.php'));
    }
}
