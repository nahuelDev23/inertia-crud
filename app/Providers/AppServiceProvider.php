<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Inertia::share('flash',
            function () {
                return [
                    'success' => Session::get('success'),
                ];
            });
        Inertia::share('errorLogin',
            function () {
                return [
                    'errorLogin' => Session::get('errorLogin'),
                ];
            });
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
            "flash" => function (){
                return [
                    "status" => session("status"),
                    "success"=> session("success"),
                    "error" => session("error"),
                ];
            },
            "request" => function (){
                return [
                    "token" => request()->route("token")
                ];
            },
        ]);
    }
}
