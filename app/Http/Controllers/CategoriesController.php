<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Flower_category;
use App\Http\Requests\addCategoryRequest;
use App\Http\Requests\editCategoryRequest;

class CategoriesController extends Controller
{
    public function add(addCategoryRequest $request, Flower_category $category) {


        $category = new Flower_category; 

        $category->fc_name = $request->fc_name;
        $category->fc_desc = $request->fc_desc;
    
        $category->save();
        return redirect('maintenance-categories');

    }
    
    public function show(Flower_category $category) {

        return view('pages.admin.maintenance.categories.edit-categories', compact('category'));

    }

    public function edit(editCategoryRequest $request, Flower_category $category){

    	$category->fc_name = $request->fc_name;
        $category->fc_desc = $request->fc_desc;
    
        $category->save();
        return redirect('maintenance-categories');

    }

}
