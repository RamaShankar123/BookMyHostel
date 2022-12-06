@extends('layout.app')
@section('content')
<div class="container">
    <div class="row" style="padding-bottom:3%;">
            <div class="col-sm-10"><h3>Add Student</h3></div>
            <div class="col-sm-2" style="position:relative;left: 10%;"><a class="btn btn-success" href="{{url('student-list')}}">Back</a></div>
    </div>
    <form method="post" action="{{url('/admin-save-student')}}" enctype="multipart/form-data">
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
                      <option value="{{$value->id}}">{{$value->hostel_name}}</option>
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
              <input type="text" class="form-control" id="student_name_id" name="student_name" maxlength="50">
            </div>
          </div>
       </div>
       @csrf
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Student Phone :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="student_phone_id" name="student_phone" onkeypress="return returnOnlyNumberKey(event);" 
              maxlength="12">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Student Email :</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="student_email_id" name="student_email">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Fathers Name :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="father_name_id" name="father_name" maxlength="500">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Fathers Phone :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="father_phone_id" name="father_phone" maxlength="500">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Fathers Email :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="father_email" name="father_email" maxlength="500">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Coaching name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address_id" name="coching_name" maxlength="500">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Student Address:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address_id" name="address_name" maxlength="500">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Room Number :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="room_number_id" name="room_number_name" onkeypress="return returnOnlyNumberKey(event);" maxlength="10">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Bed Type :</label>
            <div class="col-sm-10">
             <select class="form-control" id="bed_type_id" name="bed_type_name">
                <option>select bed type</option>
                <option value="single bed">single bed</option>
                <option value="double bed">double bed</option>
                <option value="triple bed">triple bed</option>
                <option value="four bed">four bed</option>
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
              <option value="Monthly">Monthly</option>
              <option value="3-Monthly">3 Month</option>
              <option value="6-Monthly">6 Month</option>
              <option value="Yearly">Yearly</option>
            </select>
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Payment :</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" onkeypress="return returnOnlyNumberKey(event);" name="payment_name" maxlength="7">
            </div>
          </div>
       </div>
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

    