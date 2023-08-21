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
    

            {{-- message --}}
            {!! Toastr::message() !!}
            <!-- Statistics Widget -->
 </div>
        <!-- /Page Content -->
    </div>
@endsection
@else
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
          <?php
           $users = DB::table('checkins')->get();
          
           foreach($users as $data){
           $check= $data->checkin;
           //echo $check;
           }
;
          ?>
          
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <a href="{{ route('/myinfo') }}" style="color:black;"> 
                        <div class="dash-widget-info">
                                <h4> <span>My info</span></h4>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
                
                   
                </div>
<!-- add attendance -->
                <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="submit-section">
                    <form action="{{ route('checkin') }}" method="POST">
                    <?php
                    date_default_timezone_set('Asia/Kolkata');
                    $currentTimestamp = time();

                    $timestampFormatted = date(' H:i ', $currentTimestamp); 
                    ?>
                    @csrf
                    
                    <input class="form-control" type="hidden" name="checkin" id="checkin" value="<?php echo $timestampFormatted;?>">
                    <input class="form-control" type="hidden" name="check" id="check" value="<?php echo $check;?>">

                    <button type="submit" class="btn btn-primary submit-btn">Check In</button>
                    </form>
                </div>
                </div>
                 <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="submit-section">
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <input class="form-control" type="hidden" name="checkout" id="checkout" value="<?php echo $timestampFormatted;?>">
                        <a class="dropdown" href="#" data-toggle="modal" data-target="#checkout_model">
                        <button type="submit" class="btn btn-primary submit-btn update" >Check Out</button >
                        </div>
                    </form>
                </div>
            </div>
<!-- /add attendance -->

    <!-- add pop attendance  -->
            <div class="modal custom-modal fade checkout-modal" id="checkout_model" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                         <h4 id="totaltime"></h4> 
                         <h5 id="message"></h5> 
                        </div>
                        
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                            <div class="submit-section" style="flex-wrap:nowrap !important;">
                             <div class="col-5">
                                   <a href="javascript:void(0);" data-dismiss="modal"
                                       class="btn btn-primary cancel-btn">Cancel</a>
                               </div>
                               <div class="col-5">
                               <input type="hidden" name="total" id="total" value="">

                                   <input type="hidden" name="checkout" id="checkout" value="<?php echo $timestampFormatted;?>">
                                   <button type="submit" class="btn btn-primary continue-btn submit-btn">confirm</button >

                               </div>
                           </div>
                    </form>
                   </div>
                </div>
            </div>
            </div>
<!-- /add pop attendance --> 

<!-- add js -->
<script>

        // Calculate working hours
        var checktime = document.getElementById("check").value;
        console.log(checktime);
        var checkouttime = document.getElementById("checkout").value;
        console.log(checkouttime);
       
        // Convert time strings to time objects
        var checkTimeArray = checktime.split(":");
        var checkoutTimeArray = checkouttime.split(":");
        var checkHours = parseInt(checkTimeArray[0]);
        var checkMinutes = parseInt(checkTimeArray[1]);
        var checkoutHours = parseInt(checkoutTimeArray[0]);
        var checkoutMinutes = parseInt(checkoutTimeArray[1]);

        // Calculate the time difference
        var hoursDiff = checkoutHours - checkHours;
        var minutesDiff = checkoutMinutes - checkMinutes;

        // Handle negative minutes
        if (minutesDiff < 0) {
        hoursDiff--;
        minutesDiff += 60;
        }
        var totaltime = "Working Hours: " + hoursDiff + " hours and " + minutesDiff + " minutes";
        var totalv= (hoursDiff*60 ) +minutesDiff ;
        console.log(totalv);
        var hoursDiff = parseInt(totaltime.match(/\d+/)[0]);
        console.log(hoursDiff);
       
    console.log(minutesDiff);
        var totalMinutes = (hoursDiff*60 ) + minutesDiff;
        console.log(totalMinutes);

        if (totalMinutes < 540) { 
    console.log("You have not completed 9 hou.");
    var message = "It hasn't been 9 hours yet. A halfday or brief leave can be used to mark it.";
} else {
    console.log("You have completed 9 hours.");
    var message = "You have completed 9 hours.";
}

        document.getElementById("total").value = totalv;

        var totaltimeDiv = document.getElementById("totaltime");
        var textNode = document.createTextNode("Total Time: " + totaltime);
        totaltimeDiv.appendChild(textNode);
        var messageDiv = document.getElementById("message");
        var textNode1 = document.createTextNode(message);
        messageDiv.appendChild(textNode1);

</script>
 {{-- message --}}
{!! Toastr::message() !!}
<!-- Statistics Widget -->
</div>
<!-- /Page Content -->
    </div>
@endsection
@endif
