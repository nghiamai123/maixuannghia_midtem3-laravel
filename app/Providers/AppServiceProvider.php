<?php

namespace App\Providers;

use App\Models\ProductType;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\View\View;
use App\Models\Cart2;
use Illuminate\Support\Facades\Session;
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
        Facades\View::composer(['layouts.header', 'product_type'], function (View $view) {
            $producttypes = ProductType::all();
            //truyenf biên cho view và product type
            $view->with('producttypes', $producttypes);
        });


        Facades\View::composer(['layouts.header'],function(View $view){
            if(Session('cart')){
                $oldCart=Session::get('cart'); 
                $cart=new Cart2();
                $cart = $oldCart;
                $view->with(['cart'=>Session::get('cart'),'productCarts'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
        

        
    }

    
}