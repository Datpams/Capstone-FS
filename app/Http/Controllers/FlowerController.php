<?php

namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Requests\newFlowerRequest;
use App\Flower;
use \Input as Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Flower_category;
use App\Ftag;

use App\Http\Requests\editFlowerRequest;

class FlowerController extends Controller
{
   public function show (Flower $flower) { //show specific flower

        $category= $fc->get();
        return view('pages.admin.maintenance.flowers.edit-flowers', compact('flower'));
    }
                        //NewFlower
    public function add (Request $request, Flower $flower) { //add new flower

        
     
        $flower = new Flower;

        $flower->name = $request->flowername;
        $flower->desc = $request->flowerdesc;
        $flower->price = $request->flowerprice;
        
        if(Input::hasFile('file')){//check if it contains a file
            $file = Input::file('file');
            $file->move('img', $file->getClientOriginalName());
            $flower->fimage = $file->getClientOriginalName();

        }
        $flower->save();

        $allTagIds = array();

        foreach($request->tags as $tagId)
        {
            if (substr($tagId, 0, 4) == 'new:')
            {
                $newTag = Ftag::create(['name' => ucfirst(substr($tagId, 4))]);
                $allTagIds[] = $newTag->id;
                continue;
            }
            $allTagIds[] = $tagId;
        }

        $flower->ftags()->attach($allTagIds);


        return redirect('maintenance-flowers');

    }
                        //editFlower
    public function edit (Request $request, Flower $flower) { //edit the specific flower

        //add validation
        $flower->name = $request->flowername;
        $flower->desc = $request->flowerdesc;
        $flower->price = $request->flowerprice;
         if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('img', $file->getClientOriginalName());
            $flower->fimage = $file->getClientOriginalName();

        }
        $flower->save();

        if($request->input('tags') == NULL){
            $item->tags()->detach();
        }
        else {

            $allTagIds = array();

            foreach($request->input('tags') as $tagId)
            {
                if (substr($tagId, 0, 4) == 'new:')
                {

                    $newTag = Ftag::create(['name' => ucfirst(substr(($tagId), 4))]);
                    $allTagIds[] = $newTag->id;
                    continue;
                }
                $allTagIds[] = $tagId;
            }

            $flower->ftags()->sync($allTagIds);


        }


        return redirect('maintenance-flowers');

    }

   public function delete (Flower $flower) {

        $flower->delete();

        return redirect('maintenance-flowers');
   }

}
