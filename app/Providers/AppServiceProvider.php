<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

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
        Http::macro('authService', function () {
            return Http::baseUrl(config('services.user_auth_service.base_url'))  // Adjust with your user-auth-service URL
                        ->timeout(5);  // Set timeout for the request
        });
    }
}
