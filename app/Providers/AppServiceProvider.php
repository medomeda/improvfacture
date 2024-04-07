<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        Blade::if ('admin', function () {
            return auth()->check() && auth()->user()->role == 'admin';
        });

        Activity::saving(function (Activity $activity) {
            
            $activity->properties = $activity->properties->put('agent', [
                'ip' => \Request::ip(),
                //'browser' => Browser::browserName(),
                //'os' => \Browser::platformName(),
                'url' => \Request::fullUrl(),
            ]);
        });

        Paginator::useBootstrap();
    }
}
