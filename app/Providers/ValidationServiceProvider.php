<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('alpha_spaces', function ($attribute, $value) {
            return preg_match('/^[\pL\s]+$/u', $value);
        }, 'kolom ini hanya menerima huruf.');
        
        Validator::extend('number_sixteen', function ($attribute, $value) {
            return preg_match('/^[0-9]{16}$/', $value);
        }, 'kolom ini harus berisi 16 digit angka.');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}