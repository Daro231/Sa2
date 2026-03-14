<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Set default string length for migrations
        Schema::defaultStringLength(191);

        // Add custom validation rule for current password
        Validator::extend('current_password', function ($attribute, $value, $parameters, $validator) {
            // Check if user is authenticated
            if (!Auth::check()) {
                return false;
            }
            
            // Verify the password
            return Hash::check($value, Auth::user()->password);
        }, 'The current password is incorrect.');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}