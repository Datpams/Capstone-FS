<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Requests\newFlowerRequest;
use App\Flower;
use App\Bouquet;
use \Input as Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Occasion;
use App\Flower_category;
use App\payment_method;
use App\Markup;
use App\User;
use App\Supplier;
use App\Other_item;
use App\Bouquet_Flower;
use App\Itype;
use App\Ftag;


class MaintenanceController extends Controller
{
    public function flowers () {

    	$flowers =Flower::all();
        $ftags = Ftag::all();

    	return view('pages.admin.maintenance.flowers.maintenance-flowers', compact('flowers', 'ftags'));
    }//get and return index of all flowers


     public function bouquets () {

        $flowers = Flower::all();

        $bouquets = Bouquet::all();

        $boqflow = Bouquet_Flower::all();

        $ftags = Ftag::all();

        $items = Other_item::all();

        $tags = Itype::all();


    	return view('pages.admin.maintenance.bouquets.maintenance-bouquets', compact('flowers', 'bouquets', '$boqflow', 'ftags', 'items'));
    }

     public function events() {

       $occasions =Occasion::all();
        return view('pages.admin.maintenance.events.maintenance-events', compact('occasions'));
    }

   /* public function categories() {
      $categories = Flower_category::all();
        return view('pages.admin.maintenance.categories.maintenance-categories', compact('categories'));
    }*/

    public function payments() {
        $payments = payment_method::all();
        return view('pages.admin.maintenance.payment_method.maintenance-payments', compact('payments'));
    }

    public function markups() {
        $markups = Markup::all();
        return view('pages.admin.maintenance.markup.maintenance-markup', compact('markups'));
    }

    public function employees() {
    $employees = User::all();
    return view('pages.admin.maintenance.employees.maintenance-employees', compact('employees'));
    }  

    public function suppliers() {
        $suppliers = Supplier::all();
        return view('pages.admin.maintenance.suppliers.maintenance-suppliers', compact('suppliers'));
    }

    public function items() {
        $items = Other_item::all();
        $tags = Itype::all();
        return view('pages.admin.maintenance.items.maintenance-items', compact('items', 'tags'));
    }

    public function packages() {
        $package = packages::all();
        return view('pages.admin.maintenance.packages.maintenance-packages', compact('packages'));
    }    
}



