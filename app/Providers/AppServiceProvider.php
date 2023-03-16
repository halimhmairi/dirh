<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider; 
use App\Models\Leave;
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

    view()->composer('*',function($view){
        $leavePlanned = Leave::Planned()->get()->count();
        $view->with('global',['leavePlanned'=>$leavePlanned]);
    });

    }
}
