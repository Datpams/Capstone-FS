<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cart;

class shopCartController extends Controller
{


    public function bouquet (Request $request, Cart $cart) {

    	//validate

    	if($request->boqQty <= 0){
			\Session::flash('message', "The Quantity field is required!");
			return \Redirect::back();;
		}else{
    			$cart = new Cart;
	    		$cart->name = $request->name;
	    		$cart->quantity = $request->boqQty;
	    		$cart->price = ($request->price);
	    		$cart->fimage = $request->fimage;
	    		$cart->save();
	    	
			\Session::flash('message', $request->boqQty." ". $request->name. " successfully added to Cart");
		}
		return \Redirect::back();;

    }
}









