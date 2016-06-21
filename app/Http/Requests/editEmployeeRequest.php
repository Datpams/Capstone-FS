<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class editEmployeeRequest extends Request
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
            
            'name' => 'required|alpha',
            'email' => 'required',
            'username' => 'required|min:6',
            'password' => 'required|min:6',
            'empimage' => 'image',
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
            'name.required' => 'Employee Name is required',
            'name.alpha' => 'Name should only have alphabet characters.',
            'email.required' => 'Email is required',
            'username.required' => 'Username is required',
            'username.min' => 'Username is weak.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password is weak.',

        ];        
    }
}
