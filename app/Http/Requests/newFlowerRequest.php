<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use \Input as Input;

class newFlowerRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; /*set to true later for authentication*/
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules () {
        
        return [
            'flowername' => 'required|min:3|alpha|unique:flowers,name',
            'flowerprice' => 'required|numeric|min: 0.01',
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
            'flowername.alpha' => 'Please name the flower properly',
            'flowername.min' => 'Flower\'s name is too short.',
            'flowerprice.required' => 'Flower\'s price is required',
            'flowerprice.numeric' => 'Flower\'s price must be a number',
            'flowerprice.min' => 'Flower\'s price is not valid',
        ];
    }
}
