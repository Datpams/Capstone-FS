<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\inventory;
use App\Flower;
use App\other_item;

class InventoryController extends Controller
{
   	public function showinventory (inventory $inventories, Flower $flower, other_item $items){

        $flowers= $flower->get();
        $items= $items->get();

    	$inventories = inventory::all();
    	return view('pages.admin.inventory.inventory', compact('inventories', 'flowers', 'id','name', 'desc', 'price', 'fimage', 'flower', 'items'));
    }

    public function addinventory (Request $request, inventory $invetory){

    	$newinventory = new inventory;

    	$newinventory->name = $request->name;
    	$newinventory->price = $request->price;
        $newinventory->pieces = $request->pieces;
    	$newinventory->expiration = $request->expiration;
    	$newinventory->save();

    	return redirect('inventory');
    }

       public function deleteinventory (inventory $inventory) {

        $inventory->delete();

        return redirect('inventory');
   }
}
