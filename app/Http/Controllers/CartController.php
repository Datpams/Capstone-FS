<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cart;

class CartController extends Controller
{
    

    public function index () {

    	$carts = Cart::get();
        if(count($carts) > 0){
            foreach($carts as $cart){
                
                  $price[] = ($cart->price * $cart->quantity);
             }
             $subtotal = array_sum($price);
             return view('pages.home.shopping_cart.cart', compact('carts', 'subtotal'));
         }
         return view('pages.home.shopping_cart.cart', compact('carts'));
    	   
    }

    public function show (Cart $cart) {

    	return view('pages.home.shopping_cart.editcart', compact('cart'));
    }

    public function edit (Request $request, Cart $cart) {

    	//validate
		//$price = $cart->price/$cart->quantity;
    	$cart->quantity = $request->qty;
    	$cart->save();
    	return redirect('shoppingCart');
    }

    public function delete (Cart $cart) {

    	$cart->delete();
    	
    	return redirect('shoppingCart');
    }

}
