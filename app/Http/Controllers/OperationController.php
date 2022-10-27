<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OperationController extends Controller
{
    public function index(){
         return view('oops/main_oops');
    }
}
