@extends('layout.app')
@section('content')
<div class="container">
    <div class="row">
        <h3>Add Hostel</h3>
    </div>
    <form method="post" action="{{url('/save-admin-hostel')}}" enctype="multipart/form-data">
  <div class="row justify-content-md-center" style="background-color: white;padding: 2%;border-radius: 1%;">
      @if($errors->any())
       <div class="alert alert-warning" role="alert">
       {{$errors->first()}}
      </div>
       @endif
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Hostel Name :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="hostel_name_id" name="hostel_name" maxlength="50">
            </div>
          </div>
       </div>
       @csrf
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Helpline Number :</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="helpline_number_id" name="helpline_number_name" maxlength="12">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Address :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address_id" name="address_name" maxlength="500">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Total bed Capacity :</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="capacity_id" name="capacity_name" maxlength="10">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Hostel Type :</label>
            <div class="col-sm-10">
              <select class="form-control" id="hosteltype_id" name="hosteltype_name" required>
                <option value="">select hostel type</option>
                @if(isset($HostelType))
                @foreach($HostelType as $value)
                <option value="{{$value->id}}">{{$value->hostel_type}}</option>
                @endforeach
                @endif
              </select>
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Bed Options :</label>
            <div class="col-sm-10">
              <select class="form-control" id="bedoptions_id" name="bedoptions_name" required>
                <option value="">select bed options</option>
                @if(isset($BedOptions))
                @foreach($BedOptions as $value)
                <option value="{{$value->id}}">{{$value->bed_type}}</option>
                @endforeach
                @endif
              </select>
            </div>
          </div>
       </div>
        <div class="col-lg-12">
          <div class="mb-3 row" id="file_main_div_id">
            <label for="inputPassword" class="col-sm-2 col-form-label">Upload Hostels Images :</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" name="hoseel_image[]">
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
              <input type="file" class="form-control" name="hoseel_image[]">
            </div>
            <div class="col-sm-2">
            </div>`;
         $('#file_main_div_id').append(html);
     }
 </script>
@endsection

    