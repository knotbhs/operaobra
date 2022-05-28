<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\EmpresaRepository::class, \App\Repositories\EmpresaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ServicosRepository::class, \App\Repositories\ServicosRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OrcamentosRepository::class, \App\Repositories\OrcamentosRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ClientesRepository::class, \App\Repositories\ClientesRepositoryEloquent::class);
        //:end-bindings:
    }
}
