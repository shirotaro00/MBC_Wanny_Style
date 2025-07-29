<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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

    View::composer('*', function ($view) {
        $panier = Session::get('panier', []);
        $panierCount = count($panier); // ou array_sum(...) si tu veux compter les quantités

        $view->with('panierCount', $panierCount);
    });
}
}
