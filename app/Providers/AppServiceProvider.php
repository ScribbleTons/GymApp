<?php

namespace App\Providers;


use Inertia\Inertia;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        Inertia::share([
            'errors' => function(){
                return Session::get('errors')?
                Session::get('errors')->getBag('default')->getMessages():
                (object) [];
            },
        ]);
       
    }
}
