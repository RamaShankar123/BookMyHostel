<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
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
            'user_id' => Auth::user()->id,
            'hostel_name'=>$request->hostel_name,
            'address'=>$request->address_name,
            'helpline_number'=>$request->helpline_number_name,
            'bed_capacity'=>$request->capacity_name,
            'hostel_type_id'=>$request->hosteltype_name,
            'bed_options_id'=>$request->bedoptions_name,
            'created_at'=> date('Y-m-d'),
            'updated_at'=> date('Y-m-d'),
            'is_active'=>1
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
                    'ImgName' =>$name,
                    'created_at'=>date('Y-m-d')
                ];
                $img_insert_status = DB::table('images')->insert($insert_img_array);
         }
         return redirect('hostel-list')->withErrors(['msg' => 'Hostel added successfully !']);
       }else{
        return Redirect::back()->withErrors(['msg' => 'some thing went wrong']);
       }
    }

    public function addStudentView(){
        $HostelType = DB::table('hostels_type_cfg')->where('is_active',1)->get();
        $BedOptions = DB::table('bed_options_cgf')->where('is_active',1)->get();
        $hostelData = DB::table('hostels')->where('user_id',Auth::user()->id)->where('is_active',1)->get();
        //print_r($hostelData);exit;
        return view('admin.add_student',compact('HostelType','BedOptions','hostelData'));
    }

    public function hostelList(){
            $hostelData = DB::table('hostels as h')
                        ->join('hostels_type_cfg as ht','ht.id','=','h.hostel_type_id')
                        ->select('h.id','h.hostel_name','h.address','h.bed_capacity','ht.hostel_type')
                        ->where('h.user_id',Auth::user()->id)
                        ->where('h.is_active',1)
                        ->get();
           /* echo "<pre>";
            print_r($hostelData);exit;*/
            return view('admin.hostel_list',compact('hostelData'));
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
    return view('audio_length',compact('hostelData'));
}
/*
Desc - this fun will open edit hostel view
Created On - 26-11-2022
Created By - Rama
*/
public function editHostel(Request $request){
    $hostel_id = $request->hostelid;
    $hostelData = DB::table('hostels')
                        ->where('id',$hostel_id)
                        ->get();
    $hostel = [];
    foreach($hostelData as $key =>$value){
        $hostel[$key]['id'] = $value->id;
        $hostel[$key]['hostel_name'] = $value->hostel_name;
        $hostel[$key]['address'] = $value->address;
        $hostel[$key]['helpline_number'] = $value->helpline_number;
        $hostel[$key]['bed_capacity'] = $value->bed_capacity;
        $hostel[$key]['hostel_type_id'] = $value->hostel_type_id;
        $hostel[$key]['bed_options_id'] = $value->bed_options_id;
        $hostel[$key]['images'] = $this->getHostelImages($value->id);

    }
    /*echo "<pre>";
    print_r($hostel);exit;*/
    $HostelType = DB::table('hostels_type_cfg')->where('is_active',1)->get();
    $BedOptions = DB::table('bed_options_cgf')->where('is_active',1)->get();

    return view('admin.edit_hostel',compact('hostel','HostelType','BedOptions'));
}

/*
Desc - This function will get hostel images
Created On - 11/26/2022
Created By - Rama
*/

public function getHostelImages($HostelID){
       $images = DB::table('images')
                 ->where('user_id',$HostelID)
                 ->where('is_active',1)
                 ->get();
        return $images;
}
/*
Desc - Using this function for update hostel data
Created On - 30/11/2022
Created by - Rama
*/
public function updateHoste(Request $request){
    $HostelID = $request->hostel_id_name;
    $insert_hostel_array = [
        'user_id' => Auth::user()->id,
        'hostel_name'=>$request->hostel_name,
        'address'=>$request->address_name,
        'helpline_number'=>$request->helpline_number_name,
        'bed_capacity'=>$request->capacity_name,
        'hostel_type_id'=>$request->hosteltype_name,
        'bed_options_id'=>$request->bedoptions_name,
        'created_at'=> date('Y-m-d'),
        'updated_at'=> date('Y-m-d')
    ];
    $hostel_data_status = DB::table('hostels')
                         ->where('id',$HostelID)
                         ->update($insert_hostel_array);

    foreach($request->file('hoseel_image') as $file){
           $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('HostelImages'), $name);  
            $insert_img_array = [
                'user_id' => $HostelID,
                'image_type'=>'hostels',
                'path'=>public_path('HostelImages').'/'.$name,
                'is_active'=>1,
                'ImgName' =>$name,
                'created_at'=>date('Y-m-d')
            ];
            $img_insert_status = DB::table('images')->insert($insert_img_array);
    }
    return redirect('hostel-list')->withErrors(['msg' => 'Hostel ('.$request->hostel_name.') updated  successfully !']);;
}

public function removeImg(Request $request){
    $imgID = $request->imgid;
    $status = DB::table('images')
              ->where('id',$imgID)
              ->update(['is_active'=>0]);
    if($status == 1){
        return 'success';
    }else{
        return 'fail';
    }
}

public function deleteHostel(Request $request){
    $status = DB::table('hostels')
              ->where('id',$request->hostelID)
              //->where('image_type',$request->imgType)
              ->update(['is_active'=>0]);
    if($status==1){
        return 'success';
    }else{
        return 'fail';
    }

}
}
