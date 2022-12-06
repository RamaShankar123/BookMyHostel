<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BMH</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
            @if(Auth::user()->user_type_id == 3)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-plus"></i>
                    <span>Add</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('create-user-cridentialls')}}">User</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fa fa-database"></i>
                    <span>Get Data</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('get-inquiry')}}">Get Enquery</a>
                    </div>
                </div>
            </li>
            @elseif(Auth::user()->user_type_id == 2)
           <!--  <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-plus"></i>
                    <span>Add</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin-add-hostel')}}">Hostel</a>
                        <a class="collapse-item" href="{{url('admin-add-student')}}">Student</a>
                    </div>
                </div>
            </li> -->
            <li class="nav-item @if(Request::path() =='hostel-list' || Request::path() == 'edit-hostel' || Request::path() == 'admin-add-hostel') active @endif">
                <a class="nav-link" href="{{url('/hostel-list')}}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Hostels</span></a>
            </li>
            <li class="nav-item @if(Request::path() =='student-list' || Request::path() == 'edit-student' || Request::path() == 'admin-add-student') active @endif">
                <a class="nav-link" href="{{url('/student-list')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Students</span></a>
            </li>
            <li class="nav-item @if(Request::path() =='transactions') active @endif">
                <a class="nav-link" href="{{url('/transactions')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Payments</span></a>
            </li>
            @endif
        </ul>