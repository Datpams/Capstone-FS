<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Transaction;
use App\payment_method;
use App\Cart;
use App\Cartrecord;
use DB;

class checkoutController extends Controller
{
    public function confirm (Request $request) {

    	//Validate here
        if(isset($_POST['ship'])){

            //delivery date 
            if( strtotime($request->deldate) < strtotime('now') ){
                 \Session::flash('message', "Delivery date error!");
                return \Redirect::back();;
            }//else store to db.transaction

        	$customer = new Customer;

        	$customer->name = $request->custname;
        	$customer->contactno = $request->contactno;

            //address validation
            if(ctype_space($request->address)||ctype_space($request->address2)){
               \Session::flash('message', "Your address is required!");
                return \Redirect::back();;
            }//if address is whitespace

            if($request->address2 == "" && $request->address == ""){
                \Session::flash('message', "Your address is required!");
                return \Redirect::back();;
            }//if both are empty

            if(!$request->address2 == "" && !$request->address == ""){
                $customer->address = $request->address2;
            }//if  both address has value, address2 will be set as address

            elseif($request->address2 == "" && !$request->address == ""){
                $customer->address = $request->address;
            }//if only address 1 was filled set address 1 as customer address

            elseif(!$request->address2 == "" && $request->address == ""){
                $customer->address = $request->address2;
            }//if only address 2 is filled, set address 2 as customer address
            //address validation
        	$customer->save();

        	 $trans = new Transaction;//new transaction record

            $trans->delpick = $request->deldate;
            $trans->customer_id = $customer->id;
            $trans->save();

            $carts = Cart::get();
            
            foreach($carts as $cart){
                    
                $price[] = ($cart->price * $cart->quantity);
            }
            $subtotal = array_sum($price);
            $pm = payment_method::get();
            $transaction = Transaction::find($trans->id);
            $cust = Customer::find($customer->id);
            return view('pages.home.checkout.shop-checkout-payment', compact('pm', 'subtotal','carts','cust', 'transaction'));
        }
        elseif(isset($_POST['pick'])){

            //delivery date 
            if( strtotime($request->pickdate) < strtotime('now') ){
                 \Session::flash('message', "Delivery date error!");
                return \Redirect::back();;
            }//else store to db.transaction

            $customer = new Customer;//store customer

            $customer->name = $request->custname;
            $customer->contactno = $request->contactno;
            $customer->save();


            $trans = new Transaction;//new transaction record

            $trans->delpick = $request->pickdate;
            $trans->customer_id = $customer->id;
            $trans->save();

            $carts = Cart::get();
            $ctr = 0;
            foreach($carts as $cart){
                    
                $price[] = ($cart->price * $cart->quantity);
                $ctr++;
            }

            $subtotal = array_sum($price);
            $transaction = Transaction::find($trans->id);
            $cust = Customer::find($customer->id);
            return view('pages.home.checkout.shop-pickup', compact('subtotal','carts', 'transaction', 'ctr', 'cust'));

        }
    }

    public function finish () {

        $cr = new Cartrecord;//transfer shopping cart items to 'cartrecord'
        $cart = DB::table('carts')->get();
        foreach($cart as $c){

            $cr->name = $c->name;
            $cr->fimage = $c->fimage;
            $cr->quantity = $c->quantity;
            $cr->price = $c->price;
            $cr->created_at = $c->created_at;
            $cr->updated_at = $c->updated_at;
            $cr->save();
        }

        DB::table('carts')->truncate();//remove items on shopping cart 

        return redirect('/');
        //return view('pages.home.home');

    }

    public function finish_del (Request $request) {

        $carts = Cart::get();
        $ctr = 0;
        foreach($carts as $cart){
                
            $price[] = ($cart->price * $cart->quantity);
            $ctr++;
        }

        $subtotal = array_sum($price);
        $transactionid = $request->transaction;
        $transactiondate = $request->transactiondate;
        $custname = $request->cust;
        $custc = $request->custc;
        $custa = $request->custa;
        return view('pages.home.checkout.shop-del', compact('subtotal','carts', 'ctr', 'custc', 'custname', 'transactiondate', 'transactionid', 'custa'));
    }
}






