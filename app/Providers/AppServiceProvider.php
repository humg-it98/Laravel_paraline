<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Repositories\Group\GroupRepositoryInterface;
use Repositories\Group\GroupRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GroupRepositoryInterface::class, GroupRepository::class);
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
