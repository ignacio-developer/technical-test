<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TurbineRepository;
use App\Repositories\Contracts\TurbineRepositoryInterface;
use App\Repositories\ComponentRepository;
use App\Repositories\Contracts\ComponentRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TurbineRepositoryInterface::class, TurbineRepository::class);
        $this->app->bind(ComponentRepositoryInterface::class, ComponentRepository::class);
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
