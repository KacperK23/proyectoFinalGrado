<?php

namespace App\Providers;

//use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Usuario;

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
        $this->registerPolicies();

    Gate::define('isAdmin', function (Usuario $user) {
        return $user->rol_id == 1;
    });

    Gate::define('isUsuario', function (Usuario $user) {
        // Define las condiciones para los otros roles si es necesario
        return $user->rol_id == 2;
    });
    }
}
