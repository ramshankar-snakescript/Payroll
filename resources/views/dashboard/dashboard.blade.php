
        
        @extends('layouts.master')
@section('content')
@if (Auth::user()->role == 1)
	<!-- Sidebar -->
	<!-- /Sidebar -->
    <!-- Check if the admin role is 1 -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    
                
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                      
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <a href="{{ route('all/employee/card') }}" style="color:black;"> 
                        <div class="dash-widget-info">
                                <h3>{{$emp}}</h3> <span>Employees</span>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                        <a href="{{ route('form/departments/page') }}" style="color:black;">
                        <div class="dash-widget-info">
                                <h3>{{$dept}}</h3> <span>Departments</span>
                            </div>
                        </a>
                        </div>
                    </div>
                   
                </div>
                {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                            <div class="dash-widget-info">
                                <h3>37</h3> <span>Tasks</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                   
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$emp}}</h3> <span>Employees</span>
                            </div>
                        </div>
                    </div>
                
                </div> --}}
            </div>
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Total Revenue</h3>
                                    <div id="bar-charts"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Sales Overview</h3>
                                    <div id="line-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div> --}}

            {{-- message --}}
            {!! Toastr::message() !!}
            <!-- Statistics Widget -->
 </div>
        <!-- /Page Content -->
    </div>
@endsection
@else
                   <!-- Sidebar -->
	<!-- /Sidebar -->
    <!-- Check if the admin role is 1 -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    
                
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome User!</h3>
                        
                       
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <a href="{{ route('all/employee/card') }}" style="color:black;"> 
                        <div class="dash-widget-info">
                                <h3>{{$emp}}</h3> <span>My info</span>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
                
                   
                </div>
                {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                            <div class="dash-widget-info">
                                <h3>37</h3> <span>Tasks</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                   
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$emp}}</h3> <span>Employees</span>
                            </div>
                        </div>
                    </div>
                
                </div> --}}
            </div>
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Total Revenue</h3>
                                    <div id="bar-charts"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Sales Overview</h3>
                                    <div id="line-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div> --}}

            {{-- message --}}
            {!! Toastr::message() !!}
            <!-- Statistics Widget -->






        </div>
        <!-- /Page Content -->
    </div>
@endsection
                    @endif
