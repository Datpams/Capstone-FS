<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class addItemRequest extends Request
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
            'itemname' => 'required|min:3|alpha|unique:flower,name',
            'price' => 'required|numeric|min: 0.01',
            'item_image' => 'image',            
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
            'itemname.required' => 'Item\'s name is required!',
            'itemname.alpha' => 'Please name the item properly',
            'itemname.min' => 'Item\'s name is too short.',
            'price.required' => 'Item\'s price is required',
            'price.numeric' => 'Item\'s price must be a number',
            'price.min' => 'Item\'s price is not valid',
        ];
    }
}
