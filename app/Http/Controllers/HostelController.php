<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use DB;
class HostelController extends Controller
{
    public function createCridentials(){
        $userType = DB::table('user_type_cfg')->get();
        return view('oops/create_hostel_owner_cridentials',compact('userType'));
    }

    public function saveCridentials(Request $request){
        $name = $request->owner_name;
        $phone = $request->phone;
        $user_type = $request->user_type;
        $email = $request->email;
        $_token = $request->_token;
        $password = $request->password;
        $emailstatus = DB::table('users')->where('email',$email)->count();
        if($emailstatus == 0){
            $insertArr = [
                'name' =>$name,
                'email' =>$email,
                'user_type_id' =>$user_type,
                'created_at'=>date('Y-m-d'),
                'phone' => $phone,
                'password'=>Hash::make($password),
                'created_at' => date('Y-m-d')
            ];
            $insertStatus = DB::table('users')->insert($insertArr);
            if($insertStatus == 1){
                 $insertLogArr = [
                'user_email' =>$email,
                'user_phone' => $phone,
                'user_password'=>$password,
                'created_at'=>date('Y-m-d'),
                'user_request_arr'=> json_encode($request->all())
                ];
                 DB::table('users_log_tables')->insert($insertLogArr);//inserting in log table
                 return Redirect::back()->withErrors(['msg' => 'User has been added !']);
            }else{
                return Redirect::back()->withErrors(['msg' => 'Someting went wrong, please try again after refresh !']);
            }
       }else{
        return Redirect::back()->withErrors(['msg' => 'Please use different email, given email is already registered !']);
       }

    }

    public function main(){
        return view('admin.main_admin');
    }

    public function addHoste(){
        $HostelType = DB::table('hostels_type_cfg')->where('is_active',1)->get();
        $BedOptions = DB::table('bed_options_cgf')->where('is_active',1)->get();
        return view('admin.add_hostel',compact('HostelType','BedOptions'));
    }

    public function saveHoste(Request $request){
        $insert_hostel_array = [
            'hostel_name'=>$request->hostel_name,
            'address'=>$request->address_name,
            'helpline_number'=>$request->helpline_number_name,
            'bed_capacity'=>$request->capacity_name,
            'hostel_type_id'=>$request->hosteltype_name,
            'bed_options_id'=>$request->bedoptions_name,
            'created_at'=> date('Y-m-d'),
            'updated_at'=> date('Y-m-d')
        ];
       $hostel_data_status = DB::table('hostels')->insert($insert_hostel_array);
       if($hostel_data_status == 1){
         $HostelID = DB::getPdo()->lastInsertId(); 
         foreach($request->file('hoseel_image') as $file){
               $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('HostelImages'), $name);  
                $insert_img_array = [
                    'user_id' => $HostelID,
                    'image_type'=>'hostels',
                    'path'=>public_path('HostelImages').'/'.$name,
                    'is_active'=>1,
                    'created_at'=>date('Y-m-d')
                ];
                $img_insert_status = DB::table( 'images')->insert($insert_img_array);
         }
         return Redirect::back()->withErrors(['msg' => 'Hostel added successfully !']);
       }else{
        return Redirect::back()->withErrors(['msg' => 'some thing went wrong']);
       }
    }

}
