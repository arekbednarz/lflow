<?php

namespace App\Providers;

use App\Clients\NyTimes\Books\NyTimesBooksClient;
use App\Clients\NyTimes\Books\NyTimesBooksClientInterface;
use Illuminate\Support\ServiceProvider;

class ClientServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NyTimesBooksClientInterface::class, NyTimesBooksClient::class);
    }
}
