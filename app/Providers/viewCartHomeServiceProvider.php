<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class viewCartHomeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('frontEnd/inc/header', function ($view) {
            $cartItems = collect(Session::get('cart', []))->where('users_id', Auth::id())->toArray();
            $productIds = array_keys($cartItems);
            $products = Product::whereIn('id', $productIds)->get();

            $view->with('cartItems', $cartItems)
                ->with('productIds', $productIds)
                ->with('products', $products);
        });
    }
}
