@extends('layout.app')
@section('content')
<div class="container">
  <div class="row">
    <h3>Transactions</h3>
  </div>

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Paid</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
       
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Total pending amount is 45000 </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Student Name</th>
                                            <th>Hostel Name</th>
                                            <th>Room Numbar</th>
                                            <th>Entry Date</th>
                                            <th>Amount Pending</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                     @if(!empty($studentData))
                                        @foreach($studentData as $key => $value)
                                        <tr id="Student{{$value->id}}">
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->hostel_name}}</td>
                                            <td>{{$value->room_no}}</td>
                                            <td>{{date('d/m/Y',strtotime($value->created_at))}}</td>
                                            <td>4500</td>
                                            <td><a class="btn btn-primary" href="{{url('edit-student?studentid=')}}{{$value->id}}">Pay</a></td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Total paid amount of this month 90000  </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

    </div>
  </div>
  
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

