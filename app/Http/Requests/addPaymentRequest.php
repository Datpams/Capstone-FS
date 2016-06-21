<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class addPaymentRequest extends Request
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
            'payment_name' => 'required|min:3|unique:payment_methods,payment_name',       

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
            'payment_name.unique' => 'That Payment Method already exists',
            'payment_name.required' => 'The Method name is required',
            'payment_name.min' => 'The Payment Method name is too short!',
            ];
            
    }
}
