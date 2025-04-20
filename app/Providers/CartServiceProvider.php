<?php

// app/Providers/CartServiceProvider.php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using view composer to share cart count with all views
        View::composer('*', function ($view) {
            $total = 0;
            if (Session::has('user')) {
                $userId = Session::get('user')['id'];
                $total = Cart::where('user_id', $userId)->count();
            }
            $view->with('cartCount', $total);
        });
    }
}
