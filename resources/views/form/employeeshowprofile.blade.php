@extends('layouts.master')
{{--
@section('menu')
@extends('sidebar.dashboard')
@endsection --}}
@section('content')

    <div class="page-wrapper">
        <!-- Page Content -->
       <br>
            {{-- message --}}
            {!! Toastr::message() !!}
            <!-- /Page Header -->
            <div class="card  user-profile-card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 profile-card-column">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#">

                                            {{-- <img alt="" src="{{ URL('storage/uploads/' .$users->image) }}" alt="{{ $users->name }}"> --}}
                                            @if(!empty($users->image))
                                            <img src="{{(config('app.url').'storage/app/public/uploads/' . $users->image) }}">
                                @else
                                <img src="{{ config('app.url') }}storage/app/public/user.jpeg">
                                @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="profile-info-left">
                                           
                                                <h3 class="user-name m-t-0 mb-2">{{$users->name }}</h3>
                                                
                                                <ul class="breadcrumb">
                                              <li class="breadcrumb-item"> <a activeID="mainload" href="{{ route('/myinfo') }}">Personal Details</a></li>
                                            </ul><ul class="breadcrumb">
                                              <li class="breadcrumb-item"> <a activeID="tab3" href="{{ route('/myinfo') }}">Qualifications Details</a></li>
                                            </ul>
                                            <ul class="breadcrumb">
                                              <li class="breadcrumb-item"> <a activeID="tab4" href="{{ route('/myinfo') }}">Contact Details </a></li>
                                            </ul>
                                            <ul class="breadcrumb">
                                              <li class="breadcrumb-item"> <a activeID="tab2" href="{{ route('/myinfo') }}">Emergency Contacts</a></li>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div> --}}
                         
                        <div class=" col-md-9">

                        <div class="modal-body">
                        
                        <form id="mainload" action="{{ route('myinfo/update') }}" method="POST" enctype="multipart/form-data">
                              <h3>Personal Details</h3>
                                    <hr></hr>                     
                         @csrf
                                <input type="hidden" class="form-control" id="id" name="id" value="{{ $users->id }}">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Full Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Employee id</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="empid" value="{{ $users->employee_id }}">
                                    </div>
                                </div>
                               
                                
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Department</label>
                                    <div class="col-md-10">
                                        <select class="select form-control" id="dept" name="dept">
                                            {{-- <option value="{{ $users->dept }}" {{ ( $users->gender == $users->gender) ? 'selected' : '' }}>{{ $users->department }} </option> --}}
                                            
                                                    <option value="{{$users->dept}}" {{  $users->dept ? 'selected' : '' }}>{{$users->dept}}</option>
                                               
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Designation</label>
                                    <div class="col-md-10">
                                        <select class="select form-control" id="designation" name="desg">
                                            {{-- <option value="{{ $users->gender }}" {{ ( $users->gender == $users->gender) ? 'selected' : '' }}>{{ $users->gender }} </option> --}}

                                            <option value="{{$users->desg}}">{{$users->desg}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Contact</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="company" name="contact" value="{{ $users->contact }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Date Of Joining</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="doj" name="doj" value="{{ $users->doj }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">PAN No.</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="pan" value="{{ $users->pan }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">UAN</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="uan" value="{{ $users->uan }}">
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label class="col-form-label col-md-2">PRAN</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="pran" value="{{ $users->pran }}">
                                    </div>
                                </div> -->


                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Birth Date</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="name" name="birth_date" value="{{ $users->birth_date }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Gender</label>
                                    <div class="col-md-10">
                                        <select class="select form-control" id="gender" name="gender">
                                            <option value="{{ $users->gender }}" {{ ( $users->gender == $users->gender) ? 'selected' : '' }}>{{ $users->gender }} </option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Image</label>
                                    <div class="col-md-10" id="img">
                                    <img style="height:200px;" src="{{ url('storage/uploads/') . '/' . $users->image }}">

                                        <!-- <div class="staff-msg"><a id="ch_img"  class="btn btn-custom" data-id={{$users->id}}>Change Image</a></div>
                                        <input type="hidden" name="prev_img" id="prev_img" value={{$users->image}}>
                                    </div> -->
                                    <div class="col-md-10" id="input_file">
                                        <input type="file" class="form-control" name="employee_pic" placeholder="Profile Picture" >
                                        <span class="text-danger">
                                            @error('employee_pic')
                                        {{$message}}
                                    @enderror
                                    </span>
                                </div>
                                </div></div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Account No.</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="account_no" name="account_no" value="{{ $users->account_no }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">IFSC Code</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="ifsc" name="ifsc" value="{{ $users->ifsc }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                                    </div>
                                </div>
                                </form>
<!-- add Emergency Contacts -->

                                <form style="display:none;" id="tab2" action="{{ route('myinfo/emergencycontact') }}" method="POST" enctype="multipart/form-data">
                                    <h3>Emergency Contacts</h3>
                                    @csrf
                                        <hr></hr> 
                                        <div class="form-group row">
                                        <label class="col-form-label col-md-2">Name</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control " id="name" name="name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Relationship</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control " id="relationship" name="relationship" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Mobile Number</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control " id="mobile_number" name="mobile_number" value="">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2"></label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-primary submit-btn">Update</button>
                                        </div>
                                    </div>
                                </form>
<!-- /add Emergency Contacts -->

<!-- add Qualifications Details -->

                               <form style="display:none;" id="tab3" action="{{ route('myinfo/qualifications') }}" method="POST">
                               <h3> Qualifications Details </h3>
                             <hr></hr> 
                               <h4> Work Experience </h4>
                             <hr></hr> 
                             @csrf
                             <div class="form-group row">
                                    <label class="col-form-label col-md-2">Company</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="company" name="company" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Designation</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="designation" name="designation" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">From</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control " id="from" name="from" value="">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">To</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control " id="to" name="to" value="">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Upload  Experience Letter</label>
        
                                    <div class="col-md-10" id="input_file">
                                        <input type="file" class="form-control" name="image" placeholder="Profile Picture" >
                                        <span class="text-danger">
                                            @error('image')
                                        {{$message}}
                                    @enderror
                                    </span>
                                </div>
                                </div>

                                <hr></hr> 
                             <h4>Education Details </h4>
                             <hr></hr> 
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Bachelor's Degree</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="degree" name="degree" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Passing Year</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control " id="year" name="year" value="">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Percentage</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="score" name="score" value="">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Master's Degree</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="mdegree" name="mdegree" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Passing Year</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control " id="myear" name="myear" value="">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Percentage</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="mscore" name="mscore" value="">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                                    </div>
                                </div>
                                </form>
<!-- /add Qualifications Details -->
<!-- add Contact Details -->
                                <form style="display:none;" id="tab4" action="{{ route('myinfo/address') }}" method="POST">
                                <h3>Contact Details</h3>
                             <hr></hr> 
                             <h4>Permanent Address</h4>
                             <hr></hr> 
                             @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Street </label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="street" name="street" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">City</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="city" name="city" value="">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Zip Code</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="code" name="code" value="">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">State</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="state" name="state" value="">
                                    </div>
                                </div>
                                <hr></hr> 
                             <h4>Temporary Address</h4>
                             <hr></hr> 
                             <div class="form-group row">
                                    <label class="col-form-label col-md-2">Street </label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="tstreet" name="tstreet" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">City</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="tcity" name="tcity" value="">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Zip Code</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="tcode" name="tcode" value="">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">State</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="tstate" name="tstate" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        


     

       <script>

$('li.breadcrumb-item > a').click(function(eve){
    eve.preventDefault(); eve.stopPropagation();
    var url = $(this).attr('href');
    var activeid = $(this).attr('activeID');
 $('form').hide();
$('form#'+activeid).show();



})

</script>

@endsection
