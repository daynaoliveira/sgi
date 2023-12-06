<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->register();

        Paginator::useBootstrapFive();
        \Gate::define('is-administrator', function ($user) {
            if (strtolower($user->nivel_acesso) == 'administrador') {
                return true;
            }
            return false;
        });

        \Gate::define('is-colaborator', function ($user) {
            if (strtolower($user->nivel_acesso) == 'colaborador') {
                return true;
            }
            return false;
        });
    }
}
