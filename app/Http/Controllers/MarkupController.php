<?php

namespace App\Http\Controllers;
	
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Markup;

class markupController extends Controller
{
     public function add (Request $request, Markup $markup) { //add new occasion

        $markup = new markup;

        $markup->markup_name = $request->markup_name;
        $markup->markup_desc = $request->markup_desc;
        $markup->markup_value = $request->markupRate;
        $markup->markup_range = $request->date;
        $markup->save();
        return redirect('maintenance-markup');
    }


    public function show (Markup $markup){

    	 return view('pages.admin.maintenance.markup.edit-markup', compact('markup'));
    }

     public function edit (Request $request, Markup $markup) { //add new occasion
 
        $markup->markup_name = $request->markup_name;
        $markup->markup_desc = $request->markup_desc;
        $markup->markup_value = $request->markupRate;
        $markup->markup_range = $request->date;
        $markup->save();
        return redirect('maintenance-markup');
    }

    public function delete (Markup $markup) {

        $markup->delete();

        return redirect('maintenance-markup');
    }

}
