<?php

namespace App\Http\Controllers;
	
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\payment_method;
use App\Http\Requests\addPaymentRequest;

class PaymentController extends Controller
{
     public function add (addPaymentRequest $request, payment_method $payment) {


        $payment = new payment_method;

        $payment->payment_name = $request->payment_name;
        $payment->payment_desc = $request->payment_desc;

        $payment->save();
        return redirect('maintenance-payments');
    }


    public function show (payment_method $payments){

    	 return view('pages.admin.maintenance.payment_method.edit-payments', compact('payments'));
    }

    public function edit (Request $request, payment_method $payments) { 
 
        $payments->payment_name = $request->payment_name;
        $payments->payment_desc = $request->payment_desc;

        $payments->save();
        return redirect('maintenance-payments');
    }

    public function delete (payment_method $payments) {

        $payments->delete();

        return redirect('maintenance-payments');
    }

}
