<?php

namespace App\Providers;

use App\Repositories\Eloquent\MedicoRepository;
use App\Repositories\Eloquent\PacienteRepository;
use App\Repositories\Interfaces\MedicoRepositoryInterface;
use App\Repositories\Interfaces\PacienteRepositoryInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PacienteRepositoryInterface::class, PacienteRepository::class);
        $this->app->bind(MedicoRepositoryInterface::class, MedicoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
