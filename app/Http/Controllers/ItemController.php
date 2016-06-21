<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Other_item;
use App\Itype;
use \Input as Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function show (Other_item $item){ //shows occasions

        return view('pages.admin.maintenance.items.edit-items', compact('item'));

    }

    public function add (Request $request, Other_item $item) { //add new occasion

        /*dd($request->input('itype'));*/

        $item = new Other_item;

        $item->item_name = $request->item_name;
        $item->item_desc = $request->item_desc;
        $item->price = $request->item_price;
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('img', $file->getClientOriginalName());
            $item->item_image = $file->getClientOriginalName();

        }
        $item->itype_id = $request->input('itype');
        $item->save();

        //$item->itypes()->attach($request->input('itype'));
        
        return redirect('maintenance-items');

    }

    public function edit (Request $request, Other_item $item) {


        $item->item_name = $request->item_name;
        $item->item_desc = $request->item_desc;
        $item->price = $request->item_price;
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('img', $file->getClientOriginalName());
            $item->item_image = $file->getClientOriginalName();

        }
        $item->itype_id = $request->input('itype');
        $item->save();
        return redirect('maintenance-items');
     }

     public function delete ($item) {

        $clicked = Other_item::find($item);

        $clicked->delete();

        return redirect('maintenance-items');
     }
}
