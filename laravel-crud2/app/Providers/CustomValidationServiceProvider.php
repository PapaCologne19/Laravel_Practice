<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('uppercase', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[A-Z]/', $value) > 0;
        });

        Validator::extend('lowercase', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[a-z]/', $value) > 0;
        });
    }
}
