<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;

class TransactionController extends Controller
{
    public function transactions(){
        $studentData = DB::table('student as s')
                        ->join('hostels as h','h.id','=','s.hostel_id')
                       ->select('s.id','s.name','s.phone','h.hostel_name','s.room_no','s.created_at')
                       ->where('s.is_active',1)
                        ->where('h.user_id',Auth::user()->id)
                        ->get();
       /*echo "<pre>";
        print_r($studentData);exit;*/
        return view('admin.payment_main',compact('studentData'));
    }
}
