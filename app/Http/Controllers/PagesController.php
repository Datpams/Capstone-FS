<?php

namespace App\Http\Controllers;

use DB;
use Request;
use Illuminate\Support\MessageBag;

use App\Flower;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Cart;

use Bouquet;

class PagesController extends Controller
{

    public function home () {

        return view('pages.home.home');
    }

	public function flowers () {

        $flowers = DB::table('flowers')->get();
        return view('pages.home.flowers', compact('flowers'));
    }

    public function bouquets () {

        $bouquets = DB::table('bouquets')->get();
    	return view('pages.home.bouquets.shop-bouquets', compact('bouquets'));
    }

    public function events () {
    	return view('pages.home.events.shop-events');
    }

    public function checkout () {

        $carts = Cart::get();
        if(count($carts) > 0){
            foreach($carts as $cart){
                
                  $price[] = ($cart->price * $cart->quantity);
             }
             $subtotal = array_sum($price);
             return view('pages.home.checkout.1shop-checkout', compact('carts', 'subtotal'));
         }
        $bouquets = DB::table('bouquets')->get();
        \Session::flash('message', "Please fill your cart first!");
        return view('pages.home.bouquets.shop-bouquets', compact('bouquets'));
    }

    //package
    //otheritems

    public function admin () {

    	return view('pages.admin.admin');
    }

    public function adminlogin (Request $request) {
        
      $name = Request::input('username');

      echo $name;//employee login not yetworking

    }

    public function maintenance () {

    	return view('pages.admin.maintenance.maintenance');
    }

	public function inventory () {

        $flowers = DB::table('flowers')->get();

        return view('pages.admin.inventory.inventory', compact('flowers'));
    }

    public function report () {
    	return view('pages.admin.report.report');
    }
     public function dashboard () {
        return view('pages.admin.dashboard');
    }
    
    public function search () {
        return view('pages.admin.search');
    }

    public function calendar () {
        return view('pages.admin.calendar');
    }
    
    public function transfer () {
        $inventories = DB::table('inventories')->get();

        return view('pages.admin.inventory.transfer', compact('inventories'));
    }  
}
