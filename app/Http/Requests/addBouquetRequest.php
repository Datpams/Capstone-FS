<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class addBouquetRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'boqname' => 'required|min:3|unique:bouquets,name',
            'boqdesc' => 'required',
            //'qty[]' => 'required',
            'file' => 'image',
        ];

        $validator = Validator::make(Input::all(), $rules);

        // check if the validator failed
        if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages();
            // redirect our user back to the form with the errors from the validator
            return Redirect::back()->withErrors($validator);
        }
    }

     public function messages () {

        return [
            'boqname.required' => 'The name of the bouquet is required',
            'boqname.unique' => 'That Bouquet already exists!',
          //  'qty[].required' => 'Please add a flower to Bouquet',
            'boqdesc.required' => 'The bouquet description is required',
            'boqname.min' => 'Bouquet name too short!',
        ];
    }
}
