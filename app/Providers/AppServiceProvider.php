<?php

namespace App\Providers;


use Illuminate\Support\Facades\Response;
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
        Response::macro('apiSuccess', function ($data) {
            return response()->json($data);
        });

        Response::macro('apiValidationError', function ($validationErrors) {
            return response()->json([
                'errors' => $validationErrors
            ], 400);
        });
    }
}
