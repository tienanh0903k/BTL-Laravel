<?php

namespace App\Providers;
use App\Helper\Cart;
use Illuminate\Contracts\View\View;
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
        view()->composer("*", function($view) {
            $view->with([
                'cart' => new Cart()
            ]);
        });
    }
}
