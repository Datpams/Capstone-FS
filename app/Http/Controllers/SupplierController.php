<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Supplier;
use App\Http\Requests\addRequestSupplier;
use App\Http\Requests\editRequestSuppliers;

class SupplierController extends Controller
{
    
     public function show (Supplier $supplier){ //shows occasions

        return view('pages.admin.maintenance.suppliers.edit-suppliers', compact('supplier'));

    }
                        //addRequestSupplier
    public function add (Request $request, Supplier $supplier) { //add new occasion


        $supplier = new Supplier;

        $supplier->supplier_compname = $request->supplier_compname;
        $supplier->supplier_add = $request->supplier_add;
        $supplier->supplier_contact = $request->supplier_contact;
        $supplier->save();
        return redirect('maintenance-suppliers');

    }
                        //editRequestSuppliers
    public function edit (Request $request, Supplier $supplier) {

        $supplier->supplier_compname = $request->supplier_compname;
        $supplier->supplier_add = $request->supplier_add;
        $supplier->supplier_contact = $request->supplier_contact;
        $supplier->save();
        return redirect('maintenance-suppliers');

     }

     public function delete (Supplier $supplier) {

        $supplier->delete();

        return redirect('maintenance-suppliers');
     }
}
