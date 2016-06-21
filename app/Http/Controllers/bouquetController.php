<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Flower;
use \Input as Input;
use App\Bouquet;
use App\Bouquet_Flower;
use DB;
use App\Http\Controllers\stdClass;
use App\Http\Requests\addBouquetRequest;
use App\Http\Requests\editBouquetRequest;

class bouquetController extends Controller
{

	public function show (Bouquet $bouquet, Bouquet_Flower $boqflow, Flower $flower) {

	$flowers = $boqflow->where('bouquet_id', '=', $bouquet->id)->get();

	 	
		$arr = new \stdClass();
		
	 	$ctr = 0;

	 	foreach($flowers as $f){
	 	
			$catch = $flower->where('id', '=', $f->flower_id)->get();
			
			$id[] = $catch[0]->id;
			$name[] = $catch[0]->name;
			$desc[] = $catch[0]->desc;
			$price[] = $catch[0]->price;
			$fimage[] = $catch[0]->fimage;
	 		$ctr+=1;
	 	}

	    return view('pages.admin.maintenance.bouquets.edit-bouquets', compact('bouquet', 'flowers', 'id','name', 'desc', 'price', 'fimage', 'flower'));//flowers = boquet flower|| flower = flowers database
    }

	public function add (Request $request, Flower $flower, Bouquet $bouquet, Bouquet_Flower $boqflow) {

		//dd($request->input('id'));

		//validation
		$ctr = 0;
		$price;
		$qcheck = 0;
		
		foreach($request as $r){
			$qcheck += $request['qty.'.$ctr];
			$ctr++;
		}
		if($qcheck <= 0){
			return redirect('maintenance-bouquets');
		}

		$ctr = 0;
		foreach($request as $r){
			
			if($request['qty.'.$ctr] > 0){
				$id[] = ($request['id.'.$ctr]);
				$selflow[] = ($request['ff.'.$ctr]*$request['qty.'.$ctr]);
				$qty[] = ($request['qty.'.$ctr]);
			}

			$ctr++;

		}
		$total = array_sum($selflow);
		
		$bouquet = new Bouquet;

		$bouquet->name = $request->boqname;
		$bouquet->desc = $request->boqdesc;
		if(Input::hasFile('file')){//check if it contains a file
            $file = Input::file('file');
            $file->move('img', $file->getClientOriginalName());
            $bouquet->fimage = $file->getClientOriginalName();

        }
        $bouquet->price = $total;
        $bouquet->save();

        $ctr2 = 0;
        foreach($id as $i){

        	$bf = new Bouquet_Flower;
        	$bf->bouquet_id = $bouquet->id;
        	$bf->flower_id = $id[$ctr2];
        	$bf->quantity = $qty[$ctr2];
        	$bf->save();
        	$ctr2 += 1;
        }

        return redirect('maintenance-bouquets');
	}

    public function edit (Request $request, Flower $flower, Bouquet $bouquet, Bouquet_Flower $boqflow ) {
		
		//validation
		$piv = $boqflow->where('bouquet_id', '=', $bouquet->id)->get();//Row in pivot table
    	$ctr = 0;
    	$qcheck = 0;
    	foreach($request as $r){
			$qcheck += $request['qty.'.$ctr];
		}
		if($qcheck <= 0){
			$alert = "<script>alert('Bouquet not saved!')</script>";
			return redirect('maintenance-bouquets')->with($alert);

		}

    	$ctr = 0;
    	$ctr1 = 0;
    	
    	for($ctr; $ctr<count($piv);$ctr++){

    		$selflow[] = ($request['price.'.$ctr]*$request['qty.'.$ctr]);

    		DB::table('bouquets_flowers')
    			->where('flower_id', $request['id.'.$ctr])
    			->update(array('quantity' => $request['qty.'.$ctr]));
    	}

    	$bouquet->name = $request->boqname;
    	$bouquet->desc = $request->boqdesc;
    	if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('img', $file->getClientOriginalName());
            $bouquet->fimage = $file->getClientOriginalName();

        }
        $bouquet->price = array_sum($selflow);
        $bouquet->save();
        return redirect('maintenance-bouquets');
    }

    public function delete (Bouquet $bouquet) {

    	$bouquet->delete();

    	return redirect('maintenance-bouquets');
    }

}
