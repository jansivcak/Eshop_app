<?php

namespace App\Providers;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function($view) {
            $cart = auth()->check()
                ? ShoppingCart::where('customer_id', auth()->id())->where('paied', false)->first()
                : ShoppingCart::where('session_id', session()->getId())->where('paied', false)->first();

            $items = $cart ? $cart->items()->with('product.mainPhoto')->get() : collect();
            $view->with('cartItems', $items);
        });
    }
}
