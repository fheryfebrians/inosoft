<?php

namespace App\Providers;

use App\Interfaces\KendaraanInterface;
use App\Interfaces\PenjualanInterface;
use App\Repositories\KendaraanRepository;
use App\Repositories\PenjualanRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(KendaraanInterface::class, KendaraanRepository::class);
        $this->app->bind(PenjualanInterface::class, PenjualanRepository::class);
    }

    public function boot()
    {
        // 
    }
}