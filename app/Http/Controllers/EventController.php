<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Input as Input;
use App\Occasion;
use App\Http\Requests\addEventRequest;
use App\Http\Requests\editEventRequest;

class EventController extends Controller
{
    public function show (Occasion $occasion){ //shows occasions

        return view('pages.admin.maintenance.events.edit-occasions', compact('occasion'));

    }

    public function add (addEventRequest $request, Occasion $occasion) { //add new occasion


        $occasion = new Occasion;

        $occasion->occasionname = $request->occasionname;
        $occasion->occasiondesc = $request->occasiondesc;

        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('img', $file->getClientOriginalName());
            $occasion->oimage = $file->getClientOriginalName();

        }
        $occasion->save();
        return redirect('maintenance-events');

    }

    public function edit (Request $request, Occasion $occasion) {

        //Validate

        $occasion->occasionname = $request->occasionname;
        $occasion->occasiondesc = $request->occasiondesc;
         if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('img', $file->getClientOriginalName());
            $occasion->oimage = $file->getClientOriginalName();

        }
        $occasion->save();
       return redirect('maintenance-events');
     }

     public function delete (Occasion $occasion) {

        $occasion->delete();

        return redirect('maintenance-events');
     }

}
