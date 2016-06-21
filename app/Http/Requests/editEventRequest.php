<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class editEventRequest extends Request
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
            'occasionname' => 'required|min:3',
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

     public function messages (){

        return [

            'occasionname.required' => 'The Event name is required',
            'occasionname.min' => 'The Event name is too short!',
        ];        
    }
}
