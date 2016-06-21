<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class addMarkupRequest extends Request
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
            'markup_name' =>'required|min:3|unique:markups,markup_name',
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
        return [
            'markup_name.unique' => 'That Mark-up name already exists',
            'markup_name.required' => 'The Mark-up name is required',
            'markup_name.min' => 'The Mark-up name is too short!',
        ];
    }
}
