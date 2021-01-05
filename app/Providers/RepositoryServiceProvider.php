<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Contracts\TodoContract;
use App\Repository\Eloquent\TodoEloquent;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(TodoContract::class, TodoEloquent::class);
    }
}
