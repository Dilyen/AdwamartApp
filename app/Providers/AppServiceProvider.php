<?php

namespace App\Providers;
use App\Offer;
use App\Item;
use App\Deal;
use Schema;
use App\Product;
use App\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if (Schema::hasTable('products') && (Schema::hasTable('deals'))) {
            $offers = Offer::get();
            $items = Item::get();
            $products = Product::get();
            $categories = Category::get();
            $deals = Deal::get();

            $public_data = [
                'deals' => $deals,
                'products' => $products,
                'offers' => $offers,
                'categories' => $categories,
                'items' => $items
            ];

            view()->share('public_data', $public_data);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
