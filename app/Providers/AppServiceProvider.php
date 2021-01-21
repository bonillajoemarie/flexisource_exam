<?php

namespace App\Providers;

use App\Repositories\CustomerInterface;
use App\Repositories\CustomerRepositories;
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
        $this->app->bind(
            CustomerInterface::class,
            CustomerRepositories::class
        );
    }
}
