@extends('layout.app')
@section('content')
<div class="container">
  <div class="row justify-content-md-center">
      <table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Father Name</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Class</th>
      <th scope="col">Area</th>
      <th scope="col">Bed Option</th>
      <th scope="col">Submited Date</th>
    </tr>
  </thead>
  <tbody>
    @if(!empty($data))
    @foreach($data as $key => $value)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$value->name}}</td>
      <td>{{$value->fathersName}}</td>
      <td>{{$value->mobileNumber}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->gender}}</td>
      <td>{{$value->class}}</td>
      <td>{{$value->area}}</td>
      <td>{{$value->bedOption}}</td>
      <td>{{$value->created_at}}</td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>

   </div>
 </div>
@endsection