@extends('layout.app')
@section('content')
@if(!empty($studentData))
@foreach($studentData as $svalue)
<div class="container">
    <div class="row" style="padding-bottom:3%;">
            <div class="col-sm-10"><h3>Edit Student</h3></div>
            <div class="col-sm-2" style="position:relative;left: 10%;"><a class="btn btn-success" href="{{url('student-list')}}">Back</a></div>
    </div>
    <form method="post" action="{{url('/update-student')}}" enctype="multipart/form-data">
  <div class="row justify-content-md-center" style="background-color: white;padding: 2%;border-radius: 1%;">
      @if($errors->any())
       <div class="alert alert-warning" role="alert">
       {{$errors->first()}}
      </div>
       @endif
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Select Hostel :</label>
            <div class="col-sm-10">
              <select class="form-control" name="hostel_name_name" required>
                 @if(!empty($hostelData))
                    @foreach($hostelData as $value)
                      <option value="{{$value->id}}" @if($value->id == $svalue->hostel_id) selected @endif>{{$value->hostel_name}}</option>
                    @endforeach
                 @else
                    <option value="">Please Add hostel first</option>
                 @endif
              </select>
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Student Name :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="student_name_id" name="student_name" maxlength="50" value="{{$svalue->name}}">
            </div>
          </div>
       </div>
       <input type="hidden" value="{{$svalue->id}}" name="student_id_name">
       @csrf
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Student Phone :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="student_phone_id" name="student_phone" onkeypress="return returnOnlyNumberKey(event);" 
              maxlength="12" value="{{$svalue->phone}}" required>
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Student Email :</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="student_email_id" name="student_email" value="{{$svalue->email}}">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Fathers Name :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="father_name_id" name="father_name" maxlength="500" value="{{$svalue->father_name}}">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Fathers Phone :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="father_phone_id" name="father_phone" maxlength="500" value="{{$svalue->father_phone}}">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Fathers Email :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="father_email" name="father_email" maxlength="500" value="{{$svalue->father_email}}">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Coaching name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address_id" name="coching_name" maxlength="500" value="{{$svalue->coaching}}">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Student Address:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address_id" name="address_name" maxlength="500" value="{{$svalue->address}}" required>
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Room Number :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="room_number_id" name="room_number_name" onkeypress="return returnOnlyNumberKey(event);" maxlength="10" value="{{$svalue->room_no}}" required>
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Bed Type :</label>
            <div class="col-sm-10">
             <select class="form-control" id="bed_type_id" name="bed_type_name">
                <option>select bed type</option>
                <option value="single bed" @if($svalue->bed_type == 'single bed') selected  @endif>single bed</option>
                <option value="double bed" @if($svalue->bed_type == 'double bed') selected  @endif>double bed</option>
                <option value="triple bed" @if($svalue->bed_type == 'triple bed') selected  @endif>triple bed</option>
                <option value="four bed"   @if($svalue->bed_type == 'four bed') selected  @endif>four bed</option>
              </select>
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Payment Cycle :</label>
            <div class="col-sm-10">
            <select class="form-control" id="payment_cycle_id" name="payment_cycle_name">
              <option>select payment option</option>
              <option value="Monthly" @if($svalue->payment_cycle == 'Monthly') selected  @endif>Monthly</option>
              <option value="3-Monthly" @if($svalue->payment_cycle == '3-Monthly') selected  @endif>3 Month</option>
              <option value="6-Monthly" @if($svalue->payment_cycle == '6-Monthly') selected  @endif>6 Month</option>
              <option value="Yearly" @if($svalue->payment_cycle == 'Yearly') selected  @endif>Yearly</option>
            </select>
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Payment :</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" onkeypress="return returnOnlyNumberKey(event);" name="payment_name" maxlength="7" value="{{$svalue->payment}}">
            </div>
          </div>
       </div>
              <!-- current images  html-->
       @if(!empty($images))
       <div class="col-lg-12" style="padding-bottom:4%;">
          <div class="col-md-3 row">
            Current Images :
          </div>
          <div class="col-md-9">
            <div class="row">               
                @foreach($images as $images)
                <div class="col-md-3" id="Img{{$images->id}}">
                  <img src="{{asset('/StudentImages')}}/{{$images->ImgName}}" style="height:150px;width: 150px;">
                    <a class="btn btn-danger" onclick="deleteImg('{{$images->id}}','students')" style="position: relative;bottom: 34px;">Remove</a>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        @endif
       <!-- end current images html -->
        <div class="col-lg-12">
          <div class="mb-3 row" id="file_main_div_id">
            <label for="inputPassword" class="col-sm-2 col-form-label">Upload Student Images :</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" name="student_image[]">
            </div>
            <div class="col-sm-2">
                <a class="btn btn-secondary" onclick="addMoreFile()">Add More</a>
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <button class="btn btn-success" style="float:right;">Submit</button>  
       </div>
   </div>
</form>
 </div>
 @endforeach
 @endif
 <script type="text/javascript">
     function addMoreFile(){
         var html =`<label for="inputPassword" class="col-sm-2 col-form-label" style="margin-top:1%;"></label>
            <div class="col-sm-8">
              <input type="file" class="form-control" name="student_image[]">
            </div>
            <div class="col-sm-2">
            </div>`;
         $('#file_main_div_id').append(html);
     }
 </script>
@endsection

    