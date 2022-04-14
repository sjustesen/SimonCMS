<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\BackendNavigationRepositoryInterface;
use App\Repositories\BackendNavigationRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BackendNavigationRepositoryInterface::class, BackendNavigationRepository::class);
    }
}
