@extends('layout.app')
@section('content')
<div class="container">
    @if($errors->any())
       <div class="alert alert-warning" role="alert">
       {{$errors->first()}}
      </div>
    @endif
    <div class="row" style="padding-bottom: 2%;">
            <div class="col-sm-10"><h3>Student List</h3></div>
            <div class="col-sm-2"><a class="btn btn-success" href="{{url('admin-add-student')}}">Add Student</a></div>
    </div>
  <div class="row justify-content-md-center" style="background-color: white;padding: 2%;border-radius: 1%;">
  <table class="table table-striped">
   <thead>
    <tr>
      <td>S.N</td>
      <td>Student Name</td>
      <td>Hostel Name</td>
      <td>Room Numbar</td>
      <td>Entry Date</td>
      <td>Action</td>
    </tr>
   </thead>
    <tbody>
        @if(!empty($studentData))
            @foreach($studentData as $key => $value)
            <tr id="Student{{$value->id}}">
                <td>{{$key+1}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->hostel_name}}</td>
                <td>{{$value->room_no}}</td>
                <td>{{date('d/m/Y',strtotime($value->created_at))}}</td>
                <td><a class="btn btn-danger" onclick="deleteStudent('{{$value->id}}')">Delete</a>&nbsp;&nbsp;<a class="btn btn-primary" href="{{url('edit-student?studentid=')}}{{$value->id}}">Edit</a></td>
            </tr>
            @endforeach
        @endif
   </tbody>
    </table>
 </div>
</div>
<script>
    function deleteStudent(studentID){
        if(confirm('Are you sure you want to delete this student !')){
           var url = '/delete-student';
             $.ajax({
              type:'POST',
              url:url,
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              data:{studentID:studentID},
              beforeSend: function(){
                $('.loading').show();
              },
              success:function(data){
                if(data == 'success'){
                  $('#Student'+studentID).remove();
                  alert('student removed successfully !');
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

    