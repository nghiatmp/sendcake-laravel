<?php

namespace App\Providers;
use Session;
use App\cart;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
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
        // view()->composer('header',function($view){
        //     if(Session('cart')){
        //     $oldCart = Session::get('cart');
        //     $cart =  new  Cart($oldCart);
        //     view::with(['cart'=>Session::get('cart'),'productcart'=>$cart->items,'totalPrice'=>$cart->$totalPrice,'totalQty'=>$cart->$totalQty]);
        // }
        // });
        // view()->composer('header',function(){
        //     $loaisanpham = ProductType::all();
        //     view::with(['loaisanpham'=>$loaisanpham]);
        // });
    }
}
