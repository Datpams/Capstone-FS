<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class editCategoryRequest extends Request
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
            'fc_name' => 'required|min:3',        
 
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

    public function messages(){
        return[

            'fc_name.required' => 'The Category name is required',
            'fc_name.min' => 'The Category name is too short!',
        ];
            
    }
}
