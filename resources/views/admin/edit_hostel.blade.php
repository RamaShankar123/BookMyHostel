@extends('layout.app')
@section('content')
<div class="container">
    <div class="row" style="padding-bottom:3%;">
            <div class="col-sm-10"><h3>Edit Hostel</h3></div>
            <div class="col-sm-2" style="position:relative;left: 10%;"><a class="btn btn-success" href="{{url('hostel-list')}}">Back</a></div>
    </div>
@if(!empty($hostel))
@foreach($hostel as $value)
    <form method="post" action="{{url('/update-admin-hostel')}}" enctype="multipart/form-data">
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
              <input type="text" class="form-control" id="hostel_name_id" name="hostel_name" maxlength="50" required value="{{$value['hostel_name']}}">
              <input type="hidden" value="{{$value['id']}}" name="hostel_id_name">
            </div>
          </div>
       </div>
       @csrf
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Helpline Number :</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="helpline_number_id" name="helpline_number_name" maxlength="12" required value="{{$value['helpline_number']}}">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Address :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address_id" name="address_name" maxlength="500" required value="{{$value['address']}}">
            </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Total bed Capacity :</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="capacity_id" name="capacity_name" maxlength="10" required value="{{$value['bed_capacity']}}">
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
                @foreach($HostelType as $valuee)
                <option value="{{$valuee->id}}" @if($valuee->id == $value['hostel_type_id'])selected="true" @endif>{{$valuee->hostel_type}}</option>
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
                @foreach($BedOptions as $valuev)
                <option value="{{$valuev->id}}" @if($valuev->id == $value['bed_options_id'])selected="true" @endif>{{$valuev->bed_type}}</option>
                @endforeach
                @endif
              </select>
            </div>
          </div>
       </div>
       <!-- current images  html-->
       @if(!empty($value['images']))
       <div class="col-lg-12" style="padding-bottom:4%;">
          <div class="col-md-3 row">
            Current Images :
          </div>
          <div class="col-md-9">
            <div class="row">               
                @foreach($value['images'] as $images)
                <div class="col-md-3" id="Img{{$images->id}}">
                  <img src="{{asset('/HostelImages')}}/{{$images->ImgName}}" style="height:150px;width: 150px;">
                    <a class="btn btn-danger" onclick="deleteImg('{{$images->id}}','hostels')" style="position: relative;bottom: 34px;">Remove</a>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        @endif
       <!-- end current images html -->
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
@endforeach
@endif
 </div>
 <script type="text/javascript">
     function addMoreFile(){
         var html =`<label for="inputPassword" class="col-sm-2 col-form-label" style="margin-top:3%;"></label>
            <div class="col-sm-8">
              <input type="file" class="form-control" name="hoseel_image[]">
            </div>
            <div class="col-sm-2">
            </div>`;
         $('#file_main_div_id').append(html);
     }
 </script>
@endsection

    