<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;

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

      public  function getDistanceOfTwoLocation(){
      $latitudeFrom=25.5941;//patna latitude
      $longitudeFrom=85.1376;//patna longitude
      $latitudeTo=28.7041;//delhi latitude
      $longitudeTo=77.1025;//delhi latitude
      $earthRadius = 6371000;
      // convert from degrees to radians
      $latFrom = deg2rad($latitudeFrom);
      $lonFrom = deg2rad($longitudeFrom);
      $latTo = deg2rad($latitudeTo);
      $lonTo = deg2rad($longitudeTo);

      $latDelta = $latTo - $latFrom;
      $lonDelta = $lonTo - $lonFrom;

      $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
      return ($angle * $earthRadius)/1000;
}

public function audioLength(){
    return view('audio_length');
}
public function adduser(){
   return view('oops/add_user');
}

public function saveAdduser(Request $request){
$emailstatus = DB::table('users')->where('email',$request->email)->count();
        if($emailstatus == 0){
            $insertArr = [
                'name' =>$request->name,
                'email' =>$request->email,
                'phone' => $request->phone,
                'password'=>Hash::make($request->password),
                'created_at'=>date('Y-m-d')
            ];
            $insertStatus = DB::table('users')->insert($insertArr);
            if($insertStatus == 1){
            $uid = DB::getPdo()->lastInsertId();
            $file = $request->profile_pick;
            $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('userImg'), $name);  
                $insert_img_array = [
                    'user_id' => $uid,
                    'image_type'=>'userImg',
                    'path'=>public_path('userImg').'/'.$name,
                    'ImgName'=>$name,
                    'is_active'=>1,
                    'created_at'=>date('Y-m-d')
                ];
                $img_insert_status = DB::table('images')->insert($insert_img_array);
                 return redirect('/user-list');
            }else{
                return Redirect::back()->withErrors(['msg' => 'Someting went wrong, please try again after refresh !']);
            }
       }else{
        return Redirect::back()->withErrors(['msg' => 'Please use different email, given email is already registered !']);
       }
}
public function getUser(){

    $users = DB::table('users')
                 ->join('images','users.id','=','images.user_id')
                 ->whereNotNull('phone')
                 ->select('users.id','users.name','users.phone','users.email','images.path','images.ImgName')
                 ->get();
        /*echo "<pre>";
        print_r($users);exit();*/
    return view('oops/user_list',compact('users'));
}

public function editUser(Request $request){
       $userID = $request->uid;
       $userData = DB::table('users')
                   ->join('images','users.id','=','images.user_id')
                   ->where('users.id',$userID)
                   ->first();
        /*echo "<pre>";
        print_r($userData);exit();*/
        return view('oops/edit_user',compact('userData','userID'));
}

public function deleteUser(Request $request){
       $userID = $request->uid;
       $status = DB::table('users')
                 ->where('id',$userID)
                 ->delete();
        if($status == 1){
          DB::table('images')
              ->where('user_id',$userID)
              ->delete();
          return redirect('/user-list');
        }else{
          return Redirect::back()->withErrors(['msg' => 'something went wrong!']);
        }


 }

public function updateUser(Request $request){
        $updateArr = [
                'name' =>$request->name,
                'email' =>$request->email,
                'phone' => $request->phone,
                'password'=>Hash::make($request->password),
                'created_at'=>date('Y-m-d')
        ];
        $updateStatus = DB::table('users')
                        ->where('id',$request->user_id)
                        ->update($updateArr);
        if($updateStatus == 1){
          $uid = $request->user_id;
            $file = $request->profile_pick;
            $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('userImg'), $name);  
                $insert_img_array = [
                    'path'=>public_path('userImg').'/'.$name,
                    'ImgName'=>$name,
                    'is_active'=>1,
                    'updated_at'=>date('Y-m-d')
                ];
                $img_insert_status = DB::table('images')
                                    ->where('user_id',$uid)
                                   ->update($insert_img_array);
                return redirect('/user-list');
        }else{
            return Redirect::back()->withErrors(['msg' => 'something went wrong!']);
        }
}
}


