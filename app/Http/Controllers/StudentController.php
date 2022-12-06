<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;

class StudentController extends Controller
{
    public function saveStudentRecord(Request $request){
        $student_data = [
                  'hostel_id'=>$request->hostel_name_name,
                  'name'=>$request->student_name,
                  'phone'=>$request->student_phone,
                  'email'=>$request->student_email,
                  'father_name'=>$request->father_name,
                  'father_phone'=>$request->father_phone,
                  'father_email'=>$request->father_email,
                  'coaching'=>$request->coching_name,
                  'address'=>$request->address_name,
                  'room_no'=>$request->room_number_name,
                  'bed_type'=>$request->bed_type_name,
                  'payment_cycle'=>$request->payment_cycle_name,
                  'payment'=>$request->payment_name,
                  'is_active'=>1
        ];
       $student_data_status = DB::table('student')->insert($student_data);
       if($student_data_status == 1){
         $StudentlID = DB::getPdo()->lastInsertId();
         if(!empty($request->file('student_image'))){
         foreach($request->file('student_image') as $file){
               $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('StudentImages'), $name);  
                $insert_img_array = [
                    'user_id' => $StudentlID,
                    'image_type'=>'students',
                    'path'=>public_path('StudentImages').'/'.$name,
                    'ImgName'=>$name,
                    'is_active'=>1,
                    'created_at'=>date('Y-m-d')
                ];
                $img_insert_status = DB::table( 'images')->insert($insert_img_array);
         }
        }
         return redirect('student-list')->withErrors(['msg' => 'student added successfully !']);
       }else{
        return Redirect::back()->withErrors(['msg' => 'some thing went wrong']);
       }
    }

    public function getStudent(Request $request){

        $studentData = DB::table('student as s')
                        ->join('hostels as h','h.id','=','s.hostel_id')
                       ->select('s.id','s.name','s.phone','h.hostel_name','s.room_no','s.created_at')
                       ->where('s.is_active',1)
                        ->where('h.user_id',Auth::user()->id)
                        ->get();
       /* echo "<pre>";
        print_r($studentData);exit;*/
        return view('admin.student_list',compact('studentData'));
    }

    public function editStudent(Request $request){
          $studentid = $request->studentid;
          $studentData = DB::table('student as s')
                         ->where('s.id',$studentid)
                         ->get();
           $hostelData = DB::table('hostels as h')
                         ->where('h.user_id',Auth::user()->id)
                        ->get();
            $images = DB::table('images')
                      ->where('user_id',$studentid)
                      ->where('image_type','students')
                      ->where('is_active',1)
                      ->get();
          /*echo "<pre>";
          print_r($images);exit;*/
          return view('admin.edit_student',compact('studentData','hostelData','images'));
    }

    public function updateStudent(Request $request){
            /*echo "<pre>";
            print_r($request->all());exit;*/
            $student_id = $request->student_id_name;
            $student_data = [
                  'hostel_id'=>$request->hostel_name_name,
                  'name'=>$request->student_name,
                  'phone'=>$request->student_phone,
                  'email'=>$request->student_email,
                  'father_name'=>$request->father_name,
                  'father_phone'=>$request->father_phone,
                  'father_email'=>$request->father_email,
                  'coaching'=>$request->coching_name,
                  'address'=>$request->address_name,
                  'room_no'=>$request->room_number_name,
                  'bed_type'=>$request->bed_type_name,
                  'payment_cycle'=>$request->payment_cycle_name,
                  'payment'=>$request->payment_name
        ];
       $student_data_status = DB::table('student')
                              ->where('id',$student_id)
                              ->update($student_data);

         $StudentlID = $student_id; 
         if(!empty($request->file('student_image'))){
         foreach($request->file('student_image') as $file){
               $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('StudentImages'), $name);  
                $insert_img_array = [
                    'user_id' => $StudentlID,
                    'image_type'=>'students',
                    'path'=>public_path('StudentImages').'/'.$name,
                    'is_active'=>1,
                    'ImgName'=>$name,
                    'created_at'=>date('Y-m-d')
                ];
                $img_insert_status = DB::table( 'images')->insert($insert_img_array);
         }
        }

        return redirect('student-list')->withErrors(['msg' => 'student updated successfully !']);
    }

    function deleteStudent(Request $request){
         $status = DB::table('student')
              ->where('id',$request->studentID)
              ->update(['is_active'=>0]);
                if($status==1){
                    return 'success';
                }else{
                    return 'fail';
                }

    }
}
