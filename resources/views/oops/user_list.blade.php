@extends('layout.app')
@section('content')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"  crossorigin="anonymous"></script>
<script src="extensions/export/bootstrap-table-export.js"></script>
<div class="container">
    <div class="row">
            <div class="col-sm-10"><h3>Users List</h3></div>
            <div class="col-sm-2" style="padding-bottom: 10px;"><a class="btn btn-success" href="{{url('add-user')}}">Add User</a></div>
    </div>
  <div class="row justify-content-md-center" style="background-color: white;padding: 2%;border-radius: 1%;">
  <table class="table table-striped" id="UserListTableID" style="width:100%;">
   <thead>
    <tr>
      <td>S.N</td>
      <td>Name</td>
      <td>Email</td>
      <td>Phone</td>
      <td>Img</td>
      <td>Actions</td>
    </tr>
   </thead>
    <tbody>
        @if(!empty($users))
            @foreach($users as $key => $value)
             <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->phone}}</td>
                <td><img src="{{asset('userImg/'.$value->ImgName.'')}}" style="height:100px;width:100px; border-radius: 10px;"></td>
                <td><a class="btn btn-secondary" href="{{url('delete-user?uid='.$value->id.'')}}">Delete</a>&nbsp;&nbsp;<a class="btn btn-primary" href="{{url('edit-user?uid='.$value->id.'')}}">Edit</a></td>
            </tr>
            @endforeach
        @endif
   </tbody>
    </table>
 </div>
</div>
<script type="text/javascript">
   
</script>
@endsection

    