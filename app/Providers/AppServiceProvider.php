<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\services\leave\request\LeaveRequestService;
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
    //    $this->app->bind(LeaveRequestService::class,function ($app)
    //    {
    //     return new LeaveRequestService
    //    });
    }
}
