<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PackagesController extends Controller
{
     public function show (Packages $package){ //shows occasions

        return view('pages.admin.maintenance.packages.maintenance-packages');

    }
}
