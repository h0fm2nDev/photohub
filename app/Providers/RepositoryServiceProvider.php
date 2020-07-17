<?php

namespace App\Providers;

use App\Repositories\Interfaces\EloquentRepositoryInterface;
use App\Repositories\Interfaces\EloquentRepositoryRelationInterface;
use App\Repositories\Interfaces\FollowInterface;
use App\Repositories\FollowRepository;
use App\Repositories\TownRepository;
use App\Repositories\AdRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, TownRepository::class);
        $this->app->bind(EloquentRepositoryRelationInterface::class, AdRepository::class);
        $this->app->bind(FollowInterface::class, FollowRepository::class);
    }
}
