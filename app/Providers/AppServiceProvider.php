<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\TurbineRepositoryInterface;
use App\Repositories\TurbineRepository;
use App\Repositories\Contracts\ComponentRepositoryInterface;
use App\Repositories\ComponentRepository;
use App\Repositories\Contracts\InspectionRepositoryInterface;
use App\Repositories\InspectionRepository;
use App\Repositories\Contracts\MotorRepositoryInterface;
use App\Repositories\MotorRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind Repositories to Interfaces
        $this->app->bind(TurbineRepositoryInterface::class, TurbineRepository::class);
        $this->app->bind(ComponentRepositoryInterface::class, ComponentRepository::class);
        $this->app->bind(InspectionRepositoryInterface::class, InspectionRepository::class);
        $this->app->bind(MotorRepositoryInterface::class, MotorRepository::class);
        
        // Bind Services to Interfaces
        $this->app->bind(TurbineService::class, TurbineService::class);
        $this->app->bind(ComponentService::class, ComponentService::class);
        $this->app->bind(InspectionService::class, InspectionService::class);
        $this->app->bind(MotorService::class, MotorService::class);

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
