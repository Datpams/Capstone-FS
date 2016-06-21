<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use \Input as Input;

class editFlowerRequest extends Request
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
    public function rules() {
        return [
            'flowername' => 'required|min:3',
            'flowerprice' => 'required|numeric|min:3',
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
            'flowername.required' => 'Flower\'s name is required!',
            'flowername.min' => 'Flower\'s name is too short',
            'flowername.exists' => 'Flower\'s name already exist,',  
            'flowerprice.required' => 'Flower\'s price is required',
            'flowerprice.numeric' => 'Flowe\'s price must be a number',
            'flowerprice.min' => 'FLower\'s price is invalid',
        ];
    }
}
