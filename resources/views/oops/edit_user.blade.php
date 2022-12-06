@extends('layout.app')
@section('content')
<div class="container">
  <div class="row justify-content-md-center">
  	@if($errors->any())
	 <div class="alert alert-warning" role="alert">
       {{$errors->first()}}
      </div>
	@endif
@if(!empty($userData))
    <div class="col col-lg-12" style="background-color: white;border-radius: 10px;padding-left: 5%;padding-right: 5%;padding-top: 2%;padding-bottom: 2%;margin-bottom: 34px;">
      <form method="POST" action="{{url('update-user')}}" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$userData->name}}" required>
  </div>
  <input type="hidden" name="user_id" value="{{$userID}}">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" name="email" value="{{$userData->email}}" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">phone : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone" maxlength="10" value="{{$userData->phone}}" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Current Profile Pick: </label>
    <img src="{{asset('userImg/'.$userData->ImgName.'')}}" style="height:100px;width: 100px;border-radius: 10px;margin-left: 50px;">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Select Profile Pick : </label>
    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="profile_pick" maxlength="10" required><br>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleeyfyeefeetInputPassword1" name="password" required>
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
</form>
    </div>
  </div>
</div>
@else
<h1>Something went wrong</h1>
@endif
<script type="text/javascript">
	
</script>
@endsection