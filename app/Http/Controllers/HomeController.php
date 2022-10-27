<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    /*
    Desc : This function is created temporary only for enquery
    Created On : 16/10/2022
    Created By : Rama
    */
    public function enqueryForm(){
        return view('oops.enquery_form');
    }

    /*
    Desc : This function will submit inquery form
    Created On : 17/10/2022
    Created By : Rama
    */
    public function submitInqueryForm(Request $request){
        $insertdata = ['name'=>$request->name,
                       'fathersName'=>$request->fathers_name,
                       'gender'=>$request->gender,
                       'mobileNumber'=>$request->mobile_number,
                       'email'=>$request->email,
                       'class'=>$request->class,
                       'area'=>$request->Area,
                       'bedOption'=>$request->BedOption,
                       'created_at'=>date('Y-m-d')
                      ];
        DB::table('hostel__enquries')->insert($insertdata);
        return redirect('/success');
    }

    public function success(Request $request){
        return view('oops.enquery_success');
    }

    public function getInquiry(){
        $data = DB::table('hostel__enquries')->get();
        /*echo "<pre>";
        print_r($data);exit;*/
        return view('oops.get_enquery',compact('data'));

    }
}


