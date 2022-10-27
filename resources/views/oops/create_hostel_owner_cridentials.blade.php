@extends('layout.app')
@section('content')
<div class="container">
  <div class="row justify-content-md-center">
  	@if($errors->any())
	 <div class="alert alert-warning" role="alert">
       {{$errors->first()}}
      </div>
	@endif
    <div class="col col-lg-12" style="background-color: white;border-radius: 10px;padding-left: 5%;padding-right: 5%;padding-top: 2%;padding-bottom: 2%;margin-bottom: 34px;">
      <form method="POST" action="{{url('save-user-cridentialls')}}">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="owner_name" required>
  </div>
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">phone : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone" maxlength="10" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User Type : </label>
     <select class="form-control" name="user_type" required>
     	@if(isset($userType))
     	   <option value="">select user type</option>
     	   @foreach($userType as $value)
     	   <option value="{{$value->id}}">{{$value->user_type}}</option>
     	   @endforeach
     	@endif
     </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" name="email" required>
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
<div class="container">
<div class="row justify-content-md-center" style="margin-bottom: 34px;">
	<div class="col-lg-3">
         <button class="btn btn-primary" onclick="generatePassword()">Generate Password</button>
    </div>
    <div class="col-lg-4">
    	<input type="text" name="" id="passwordID" readonly>
    </div>
</div>
</div>
<script type="text/javascript">
	function generatePassword(){
            var pass = '';
            var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' + 
                    'abcdefghijklmnopqrstuvwxyz0123456789@#$'; 
            for (let i = 1; i <= 8; i++){
                var char = Math.floor(Math.random()
                            * str.length + 1);
                pass += str.charAt(char);
            }
            $('#passwordID').val(pass);
            $('#exampleeyfyeefeetInputPassword1').val(pass);
	}
</script>
@endsection