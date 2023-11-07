<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('in_investment_range', function ($attribute, $value, $parameters, $validator) {
            // $value adalah nilai yang akan divalidasi
            // $parameters akan berisi minimum dan maksimum dalam urutan pertama dan kedua
            $min = $parameters[0];
            $max = $parameters[1];

            // Periksa apakah nilai $value berada dalam rentang yang valid
            return $value >= $min && $value <= $max;
        });
    }
}
