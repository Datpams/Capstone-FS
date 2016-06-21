<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use \Input as Input;

class EmployeeController extends Controller
{
    
    public function add (Request $request , User $employee){

	    $employee = new User;
	    $employee->name = $request->name;
	    $employee->email = $request->email;
	    $employee->username = $request->username;
	    $employee->password = $request->password;
	    if(Input::hasFile('file')){
	            $file = Input::file('file');
	            $file->move('img', $file->getClientOriginalName());
	            $employee->empimage = $file->getClientOriginalName();

	        }
	    $employee->save();
    	return redirect('maintenance-employees');
    }

    public function show (User $employee){ //shows occasions

        return view('pages.admin.maintenance.employees.edit-employees', compact('employee'));

    }

    public function edit (Request $request, User $employee) {

	    $employee->name = $request->name;
	    $employee->email = $request->email;
	    $employee->username = $request->username;
	    $employee->password = $request->password;
	    if(Input::hasFile('file')){
	            $file = Input::file('file');
	            $file->move('img', $file->getClientOriginalName());
	            $employee->empimage = $file->getClientOriginalName();

	        }
	    $employee->save();
	    return redirect('maintenance-employees');
     }

     public function delete (User $employee) {

     	$employee->delete();

     	return redirect('maintenance-employees');
     }
}
