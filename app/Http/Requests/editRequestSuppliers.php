<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class editRequestSuppliers extends Request
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
            'supplier_compname' => 'required|min:3',
            'supplier_add' => 'required|min:3',
            'supplier_contact' => 'numeric|max:11',
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
            'supplier_compname.required' => 'Supplier company name is required.',
            'supplier_compname.min' => 'Your name is too short.',
            'supplier_add.required' => 'Supplier Address is required.',
            'supplier_add.min' => 'Supplier Address is too short.',
            'supplier_contact.required' => 'Supplier contact number is required.',
            'supplier_contact.numeric' => 'Contact Number must contain only numbers.',
            'supplier_contact.max' => 'Only 11 numbers is allowed in Contact Number.',
        ];
    }

}
