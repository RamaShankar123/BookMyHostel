@extends('layout.app')
@section('content')
<div class="container">
    <div class="row" style="padding-bottom:3%;">
            <div class="col-sm-10"><h3>Hostels List</h3></div>
            <div class="col-sm-2"><a class="btn btn-success" href="{{url('admin-add-hostel')}}">Add Hostel</a></div>
    </div>
    @if($errors->any())
       <div class="alert alert-success" role="alert">
       {{$errors->first()}}
      </div>
    @endif
  <div class="row justify-content-md-center" style="background-color: white;padding: 2%;border-radius: 1%;">
  <table class="table table-striped">
   <thead>
    <tr>
      <td>S.N</td>
      <td>Hostel Name</td>
      <td>Hostel Address</td>
      <td>Bed Capacity</td>
      <td>Hostel Type</td>
      <td>Action</td>
    </tr>
   </thead>
    <tbody>
        @if(!empty($hostelData))
            @foreach($hostelData as $key => $value)
            <tr id="Hostel{{$value->id}}">
                <td>{{$key+1}}</td>
                <td>{{$value->hostel_name}}</td>
                <td>{{$value->address}}</td>
                <td>{{$value->bed_capacity}}</td>
                <td>{{$value->hostel_type}}</td>
                <td><a class="btn btn-danger" onclick="deleteHostel('{{$value->id}}')">Delete</a>&nbsp;&nbsp;<a class="btn btn-primary" href="{{url('edit-hostel?hostelid=')}}{{$value->id}}">Edit</a></td>
            </tr>
            @endforeach
        @endif
   </tbody>
    </table>
 </div>
</div>
<script>
    function deleteHostel(hostelID){
        if(confirm('Are you sure you want to delete this hostel !')){
           var url = '/delete-hostel';
             $.ajax({
              type:'POST',
              url:url,
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              data:{hostelID:hostelID},
              beforeSend: function(){
                $('.loading').show();
              },
              success:function(data){
                if(data == 'success'){
                  $('#Hostel'+hostelID).remove();
                  alert('Hostel removed successfully !');
                }else{
                  alert('Something went wrong !');
                }
             },
             complete: function(){
              $('.loading').hide();
            },
            error: function(data){
              $('.loading').hide();
              console.log(data);
            }
            }); 
        }
    }
</script>
@endsection

    