@extends('layouts.master')
{{--
@section('menu')
@extends('sidebar.dashboard')
@endsection --}}
@section('content')



    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <!-- /Page Header -->
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#">

                                            {{-- <img alt="" src="{{ URL('storage/uploads/' .$users->image) }}" alt="{{ $users->name }}"> --}}
                                            @if(!empty($users->image))
                                <img src="{{URL('storage/uploads/'.$users->image) }}" alt="{{ $users->name }}">
                                @else
                                <img src="{{URL('storage/user.jpeg') }}" >
                                @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{ $users->name }}</h3>
                                                @if(!empty($users->dept))
                                                <h6 class="text-muted"> {{ $users->dept }}</h6>
                                                @endif
                                                @if(!empty($users->desg))
                                                <small class="text-muted">{{ $users->desg }}</small>
                                                @endif
                                                <div class="staff-id">Employee ID : {{ $users->employee_id }}</div>
                                                @if(!empty($users->doj))
                                                <div class="small doj text-muted">Date of Join : {{ $users->doj }}</div>
                                                @endif
                                                {{-- <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send Message</a></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="display:block;">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Phone:</div>
                                                    <div class="text"><a href="">{{ $users->contact }}</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text"><a href="">{{ $users->email }}</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Birthday:</div>
                                                    @if(!empty($users->birth_date))
                                                    <div class="text">{{$users->birth_date}}</div>
                                                    @endif
                                                </li>
                                                </ul>
                                                </div>
                                                <div class="col-md-4">
                                            <ul class="personal-info">
                                                 <li>
                                                    <div class="title">Joining:</div>
                                                    @if(!empty($users))
                                                    <div class="text">{{ $users->doj }}</div>
                                                    @endif
                                                </li> 
                                                <li>
                                                <div class="title" >Gender:</div>
                                                    @if(!empty($users->gender))
                                                    <div class="text">{{ $users->gender }}</div>
                                                    @endif
                                                </li>
                                              
                                                 <li>
                                                    <div class="title">Account No:</div>
                                                    @if(!empty($users->account_no))
                                                    <div class="text">{{ $users->account_no }}</div>
                                                    @endif
                                                </li> 
                                                {{-- <li>
                                                    <div class="title">IFSC</div>
                                                    @if(!empty($users->ifsc))

                                                    <div class="text">{{$users->ifsc }}</div>

                                                    @endif
                                                </li>  --}}
                                                </ul>
                                                </div>
                                                {{-- <li>
                                                    <div class="title">Reports to:</div>
                                                    <div class="text">
                                                        <div class="avatar-box">
                                                            <div class="avatar avatar-xs">
                                                                <img src="{{ URL::to('/assets/images/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                                                            </div>
                                                        </div>
                                                        <a href="profile.html">
                                                            {{ Auth::user()->name }}
                                                        </a>
                                                    </div>
                                                </li> --}}
                                            </ul>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div> --}}
                           </div>
                        </div>
                        
                    </div><br>

                   <!-- Page Content -->
                    <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                   
                                    <th>Employee ID</th>
                                  <th>  Payslip for </th>
                                    <th>Email</th>
                                    <th>Date Of Salary</th>
                            
                                     <!-- <th>Salary</th>  -->
                                    <th >Payslip Send</th>
                                    <th>Payslip</th>
                                    <th class="text-right">Action</th>
                                    <th hidden></th>
                                <th hidden ></th>
                                <th hidden ></th>
                                <th hidden ></th>
                                <!-- <th hidden ></th> --->
                                <th hidden ></th>
                                <th hidden ></th>
                                <!-- <th hidden ></th>
                                <th hidden ></th>
                               <th hidden ></th>
                                <th hidden ></th> -->
                                <th hidden ></th>
                                <th hidden ></th>
                                <th hidden ></th>
                                <th hidden ></th><th hidden ></th>
                                <th hidden ></th>
                                <th hidden ></th>
                                <th hidden ></th>
                                <th hidden ></th>
                                <th hidden ></th>
                                <th hidden ></th>
                                <th hidden ></th>
                                <th hidden ></th>
                                <th hidden ></th>
                                <th hidden ></th>
                                    </tr>
                            </thead>
                            <tbody>
                            @foreach ($salary as $items)
                        
                                    <tr>
                                    <td>
    <h2 class="table-avatar">
        <a href="{{ url('employee/profile/' . $items->rec_id) }}" class="avatar">
            @if ($users->image)
                <img alt="" src="{{ URL::to('storage/uploads/' . $items->image) }}">
            @else
                <img alt="" src="{{ URL::to('storage/user.jpeg') }}">
            @endif
        </a>
        <a
        href="{{ url('employee/profile/' . $items->rec_id) }}">{{ $users->emp_name }}<span>{{ $users->desg }}</span></a>
                            
        
    </h2>
</td>


            
                                <td>{{ $users->employee_id }}</td>
                                <td hidden class="id">{{ $items->id }}</td>
                                <td hidden class="name">{{ $users->emp_name }}</td>
                                <td hidden class="dos">{{ $items->dos}}</td>
                                <td hidden class="basic">{{ $items->basic }}</td>
                                <!-- <td hidden class="da">{{ $items->da }}</td> --->
                                <td hidden class="hra">{{ $items->hra }}</td>
                                <td hidden class="conveyance">{{ $items->conveyance }}</td>
                                <!-- <td hidden class="allowance">{{ $items->allowance }}</td>
                                <td hidden class="medical_allowance">{{ $items->medical_allowance }}</td> -->
                                <td hidden class="tds">{{ $items->tds }}</td>
                                <td hidden class="esi">{{ $items->esi }}</td>
                                <td hidden class="pf">{{ $items->pf }}</td>
                                <td hidden class="working_day">{{ $items->working_day }}</td>
                                <td hidden class="short_leave">{{ $items->short_leave }}</td>
                                <td hidden class="half_day">{{ $items->half_day }}</td>
                                <td hidden class="leave">{{ $items->leave }}</td>
                                <td hidden class="tel_int">{{ $items->telephone_internet }}</td>
                                <td hidden class="bonus">{{ $items->bonus }}</td>
                                <td hidden class="wfh">{{ $items->wfh }}</td>
                                <td hidden class="work_in_holidays_hours">{{ $items->work_in_holidays_hours }}</td>
                                <td hidden class="work_in_holidays_days">{{ $items->work_in_holidays_days }}</td>

                                <td hidden class="labour_welfare">{{ $items->labour_welfare }}</td>
                                <td hidden class="gsalary">{{$items->gsalary}}</td>
                                <?php
                                $date = $items->dos;
                                $monthName = date('F', strtotime($date)); // Get the full month name
                                $year = date('Y', strtotime($date)); // Get the year;?>
                                <td> {{ $monthName.'-'.$year}}</td>
                                <td><a href="mailto:{{ $users->email }}">{{ $users->email }}</a></td>
                                <td>{{ $items->dos}}</td>
                                <!-- <td><a class="btn btn-sm btn-info"
                                        href="{{ url('employee/profile/' . $items->rec_id) }}">View Details</a></td> -->
                                <td> <?php if ($items->is_send): ?>
        <a class="btn btn-sm btn-warning send-button" data-id="{{ $items->id }}" href="{{ url('/send_pdf/' . $items->id) }}">Resend</a>
    <?php else: ?>
        <a class="btn btn-sm btn-success send-button" data-id="{{ $items->id }}" href="{{ url('/send_pdf/' . $items->id) }}">Send</a>
    <?php endif; ?>
</td>
<td hidden class="salary">{{ $items->salary }}</td>
                                <td><a class="btn btn-sm btn-primary"
                                        href="{{ url('form/salary/view/' . $items->id) }}">View</a></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item userSalary" href="#" data-toggle="modal"
                                                data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item salaryDelete" href="#" data-toggle="modal"
                                                data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                @endforeach                            </tboday>
                        </table>
                    </div>
                </div>
            </div>
<!-- /Page Content -->
        </div>
        </div>
        </div>

            {{-- <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
                            <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a></li>
                            <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank & Statutory <small class="text-danger">(Admin Only)</small></a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="tab-content">
                <!-- Profile Info Tab -->
                <div id="emp_profile" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Passport No.</div>
                                            <div class="text">9876543210</div>
                                        </li>
                                        <li>
                                            <div class="title">Passport Exp Date.</div>
                                            <div class="text">9876543210</div>
                                        </li>
                                        <li>
                                            <div class="title">Tel</div>
                                            <div class="text"><a href="">9876543210</a></div>
                                        </li>
                                        <li>
                                            <div class="title">Nationality</div>
                                            <div class="text">Indian</div>
                                        </li>
                                        <li>
                                            <div class="title">Religion</div>
                                            <div class="text">Christian</div>
                                        </li>
                                        <li>
                                            <div class="title">Marital status</div>
                                            <div class="text">Married</div>
                                        </li>
                                        <li>
                                            <div class="title">Employment of spouse</div>
                                            <div class="text">No</div>
                                        </li>
                                        <li>
                                            <div class="title">No. of children</div>
                                            <div class="text">2</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                       {{-- <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon" data-toggle="modal" data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                                    <h5 class="section-title">Primary</h5>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Name</div>
                                            <div class="text">John Doe</div>
                                        </li>
                                        <li>
                                            <div class="title">Relationship</div>
                                            <div class="text">Father</div>
                                        </li>
                                        <li>
                                            <div class="title">Phone </div>
                                            <div class="text">9876543210, 9876543210</div>
                                        </li>
                                    </ul>
                                    <hr>
                                    <h5 class="section-title">Secondary</h5>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Name</div>
                                            <div class="text">Karen Wills</div>
                                        </li>
                                        <li>
                                            <div class="title">Relationship</div>
                                            <div class="text">Brother</div>
                                        </li>
                                        <li>
                                            <div class="title">Phone </div>
                                            <div class="text">9876543210, 9876543210</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Bank information</h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Bank name</div>
                                            <div class="text">ICICI Bank</div>
                                        </li>
                                        <li>
                                            <div class="title">Bank account No.</div>
                                            <div class="text">159843014641</div>
                                        </li>
                                        <li>
                                            <div class="title">IFSC Code</div>
                                            <div class="text">ICI24504</div>
                                        </li>
                                        <li>
                                            <div class="title">PAN No</div>
                                            <div class="text">TC000Y56</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Family Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Relationship</th>
                                                    <th>Date of Birth</th>
                                                    <th>Phone</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Leo</td>
                                                    <td>Brother</td>
                                                    <td>Feb 16th, 2019</td>
                                                    <td>9876543210</td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#education_info"><i class="fa fa-pencil"></i></a></h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">International College of Arts and Science (UG)</a>
                                                        <div>Bsc Computer Science</div>
                                                        <span class="time">2000 - 2003</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">International College of Arts and Science (PG)</a>
                                                        <div>Msc Computer Science</div>
                                                        <span class="time">2000 - 2003</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Experience <a href="#" class="edit-icon" data-toggle="modal" data-target="#experience_info"><i class="fa fa-pencil"></i></a></h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Web Designer at Zen Corporation</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Web Designer at Ron-tech</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Web Designer at Dalt Technology</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Profile Info Tab -->

                <!-- Projects Tab -->
                <div class="tab-pane fade" id="emp_projects">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Office Management</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. When an unknown printer took a galley of type and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. When an unknown printer took a galley of type and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. When an unknown printer took a galley of type and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Hospital Administration</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. When an unknown printer took a galley of type and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Projects Tab -->

                <!-- Bank Statutory Tab -->
                <div class="tab-pane fade" id="bank_statutory">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"> Basic Salary Information</h3>
                            <form>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Salary basis <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select salary basis type</option>
                                                <option>Hourly</option>
                                                <option>Daily</option>
                                                <option>Weekly</option>
                                                <option>Monthly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Salary amount <small class="text-muted">per month</small></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Type your salary amount" value="0.00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Payment type</label>
                                            <select class="select">
                                                <option>Select payment type</option>
                                                <option>Bank transfer</option>
                                                <option>Check</option>
                                                <option>Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="card-title"> PF Information</h3>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">PF contribution</label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">PF No. <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee PF rate</label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select additional rate</option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee PF rate</label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select additional rate</option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h3 class="card-title"> ESI Information</h3>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">ESI contribution</label>
                                            <select class="select">
                                                <option>Select ESI contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select ESI contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee ESI rate</label>
                                            <select class="select">
                                                <option>Select ESI contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select additional rate</option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>

                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Bank Statutory Tab -->
            </div> --}}
        </div>
        <!-- /Page Content -->

        <!-- Profile Modal -->
        {{-- <div id="profile_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('profile/information/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-img-wrap edit-img">
                                        @if(!empty($users))
                                        <img class="inline-block" src="{{ URL::to('/assets/images/'. $users->avatar) }}" alt="{{ $users->name }}">
                                        @endif
                                        <div class="fileupload btn">
                                            <span class="btn-text">edit</span>
                                            <input class="upload" type="file" id="image" name="images">
                                            @if(!empty($users))
                                            <input type="hidden" name="hidden_image" id="e_image" value="{{ $users->avatar }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                @if(!empty($users))
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}">
                                                <input type="hidden" class="form-control" id="rec_id" name="rec_id" value="{{ $users->rec_id }}">
                                                <input type="hidden" class="form-control" id="email" name="email" value="{{ $users->email }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <div class="cal-icon">
                                                    @if(!empty($users))
                                                    <input class="form-control datetimepicker" type="text" id="birthDate" name="birthDate" value="{{ $users->birth_date }}">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="select form-control" id="gender" name="gender">
                                                    @if(!empty($users))
                                                    <option value="{{ $users->gender }}" {{ ( $users->gender == $users->gender) ? 'selected' : '' }}>{{ $users->gender }} </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        @if(!empty($users))
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $users->address }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        @if(!empty($users))
                                        <input type="text" class="form-control" id="state" name="state" value="{{ $users->state }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        @if(!empty($users))
                                        <input type="text" class="form-control" id="" name="country" value="{{ $users->country }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pin Code</label>
                                        @if(!empty($users))
                                        <input type="text" class="form-control" id="pin_code" name="pin_code" value="{{ $users->pin_code }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        @if(!empty($users))
                                        <input type="text" class="form-control" id="phoneNumber" name="phone_number" value="{{ $users->phone_number }}">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department <span class="text-danger">*</span></label>
                                        <select class="select" id="department" name="department">
                                            @if(!empty($users))
                                            <option value="{{ $users->department }}" {{ ( $users->department == $users->department) ? 'selected' : '' }}>{{ $users->department }} </option>
                                            <option value="Web Development">Web Development</option>
                                            <option value="IT Management">IT Management</option>
                                            <option value="Marketing">Marketing</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation <span class="text-danger">*</span></label>
                                        <select class="select" id="designation" name="designation">
                                            @if(!empty($users))
                                            <option value="{{ $users->designation }}" {{ ( $users->designation == $users->designation) ? 'selected' : '' }}>{{ $users->designation }} </option>
                                            <option value="Web Designer">Web Designer</option>
                                            <option value="Web Developer">Web Developer</option>
                                            <option value="Android Developer">Android Developer</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reports To <span class="text-danger">*</span></label>
                                        <select class="select" id="" name="reports_to">
                                            @if(!empty($users))
                                            <option value="{{ $users->reports_to }}" {{ ( $users->reports_to == $users->reports_to) ? 'selected' : '' }}>{{ $users->reports_to }} </option>
                                            @foreach ($user as $users )
                                            <option value="{{ $users->name }}">{{ $users->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /Profile Modal -->

        <!-- Personal Info Modal -->
        <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Personal Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passport No</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passport Expiry Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tel</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nationality <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Religion</label>
                                        <div class="cal-icon">
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Marital status <span class="text-danger">*</span></label>
                                        <select class="select form-control">
                                            <option>-</option>
                                            <option>Single</option>
                                            <option>Married</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Employment of spouse</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. of children </label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Personal Info Modal -->

        <!-- Family Info Modal -->
        <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Family Informations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-scroll">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Family Member <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date of birth <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date of birth <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-more">
                                            <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Family Info Modal -->

        <!-- Emergency Contact Modal -->
        <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Personal Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Primary Contact</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Relationship <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone 2</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Primary Contact</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Relationship <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone 2</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Emergency Contact Modal -->

        <!-- Education Modal -->
        <div id="education_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Education Informations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-scroll">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="Oxford University" class="form-control floating">
                                                    <label class="focus-label">Institution</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="Computer Science" class="form-control floating">
                                                    <label class="focus-label">Subject</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <div class="cal-icon">
                                                        <input type="text" value="01/06/2002" class="form-control floating datetimepicker">
                                                    </div>
                                                    <label class="focus-label">Starting Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <div class="cal-icon">
                                                        <input type="text" value="31/05/2006" class="form-control floating datetimepicker">
                                                    </div>
                                                    <label class="focus-label">Complete Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="BE Computer Science" class="form-control floating">
                                                    <label class="focus-label">Degree</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="Grade A" class="form-control floating">
                                                    <label class="focus-label">Grade</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="Oxford University" class="form-control floating">
                                                    <label class="focus-label">Institution</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="Computer Science" class="form-control floating">
                                                    <label class="focus-label">Subject</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <div class="cal-icon">
                                                        <input type="text" value="01/06/2002" class="form-control floating datetimepicker">
                                                    </div>
                                                    <label class="focus-label">Starting Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <div class="cal-icon">
                                                        <input type="text" value="31/05/2006" class="form-control floating datetimepicker">
                                                    </div>
                                                    <label class="focus-label">Complete Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="BE Computer Science" class="form-control floating">
                                                    <label class="focus-label">Degree</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="Grade A" class="form-control floating">
                                                    <label class="focus-label">Grade</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-more">
                                            <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Education Modal -->

        <!-- Experience Modal -->
        <div id="experience_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Experience Informations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-scroll">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                                    <label class="focus-label">Company Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input type="text" class="form-control floating" value="United States">
                                                    <label class="focus-label">Location</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input type="text" class="form-control floating" value="Web Developer">
                                                    <label class="focus-label">Job Position</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating datetimepicker" value="01/07/2007">
                                                    </div>
                                                    <label class="focus-label">Period From</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating datetimepicker" value="08/06/2018">
                                                    </div>
                                                    <label class="focus-label">Period To</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                                    <label class="focus-label">Company Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input type="text" class="form-control floating" value="United States">
                                                    <label class="focus-label">Location</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input type="text" class="form-control floating" value="Web Developer">
                                                    <label class="focus-label">Job Position</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating datetimepicker" value="01/07/2007">
                                                    </div>
                                                    <label class="focus-label">Period From</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating datetimepicker" value="08/06/2018">
                                                    </div>
                                                    <label class="focus-label">Period To</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-more">
                                            <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Experience Modal -->

        <!-- /Page Content -->
    </div>
      <!-- Edit Salary Modal -->
      <div id="edit_salary" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Staff Salary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/salary/update') }}" method="POST">
                            @csrf
                            <input class="form-control" type="hidden" name="id" id="e_id" value=""
                                readonly>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name of Employee</label>
                                        <input class="form-control  edit" type="text" name="name" id="e_name"
                                            value="" readonly>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label>Monthly Salary</label>
                                    <input class="form-control @error('salary') is-invalid @enderror" readonly
                                        type="text" name="salary" id="e_salary" value="{{ old('salary') }}"
                                        placeholder="Enter net salary">
                                    {{-- <input class="form-control" type="text" name="salary" id="e_salary" value=""> --}}
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                                        <label class="col-form-label">Date Of Salary Slip </label>
                                        <input class="form-control" type="date" name="dos" id="e_dos" placeholder="Date Of Salary Slip" value="{{ old('doj') }}">
                                    </div>
                                </div>
                    </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="text-primary">Earnings</h4>
                                    <div class="form-group">
                                        <label>Basic</label>
                                        <input class="form-control" type="text" name="basic" id="e_basic"
                                            value="">
                                    </div>
                                 
                                    <div class="form-group">
                                        <label>HRA(20%)</label>
                                        <input class="form-control" type="text" name="hra" id="e_hra"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Conveyance</label>
                                        <input class="form-control" type="text" name="conveyance" id="e_conveyance"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Working Day <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="working_day" id="e_working_day"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone And Internet Reimbursement</label>
                                        <input class="form-control" type="text" name="tel_int" id="e_tel_int"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Bonus</label>
                                        <input class="form-control" type="text" name="bonus" id="e_bonus"
                                            value="">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Work From Home </label>
                                        <input class="form-control" type="text" name="wfh" id="e_wfh"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Work In Holidays(Days)</label>
                                        <input class="form-control" type="text" name="work_in_holidays_days"
                                            id="e_work_in_holidays_days" value="">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Work In Holidays(Hours)</label>
                                        <input class="form-control" type="text" name="work_in_holidays_hours"
                                            id="e_work_in_holidays_hours" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="text-primary">Deductions</h4>
                                    <div class="form-group">
                                        <label>TDS</label>
                                        <input class="form-control" type="text" name="tds" id="e_tds"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>ESI - 3.25% employer, 0.75% employee (below 21000 gross salary)</label>
                                        <input class="form-control" type="text" name="esi" id="e_esi"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>PF</label>
                                        <input class="form-control" type="text" name="pf" id="e_pf"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                    <label>Short Leaves(1 Short Leave = 2 hours) </label>
                                    <input class="form-control" type="text" name="short_leave" id="e_short_leave"
                                            value="">
                                    </div> <div class="form-group">
                                    <label>Half day( 1 Half Day = 4 hours) </label>
                                    <input class="form-control" type="text" name="half_day" id="e_half_day"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Leave <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="leave" id="e_leave"
                                            value="">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Prof. Tax</label>
                                        <input class="form-control" type="text" name="prof_tax" id="e_prof_tax" value="">
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Home Loan</label>
                                        <input class="form-control" type="text" name="labour_welfare"
                                            id="e_labour_welfare" value="">
                                            <input class="form-control" type="hidden" name="gsalary" id="e_gsalary"  value="">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Salary Modal -->

        <!-- Delete Salary Modal -->
        <div class="modal custom-modal fade" id="delete_salary" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Salary</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
    <form action="{{ route('form/salary/delete')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <input type="hidden" name="id" class="e_id" value="">
                <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
            </div>
            <div class="col-6">
                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
            </div>
        </div>
    </form>
</div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Salary Modal -->
        {{-- delete js --}}
    <script>
        $(document).on('click', '.salaryDelete', function() {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
            
        });
    </script>

{{-- update js --}}
    <script>
        $(document).on('click', '.userSalary', function() {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_name').val(_this.find('.name').text());
            
            $('#e_salary').val(_this.find('.salary').text());
            $('#e_basic').val(_this.find('.basic').text());
           $('#e_da').val(_this.find('.da').text());
            $('#e_hra').val(_this.find('.hra').text());
            // console.log($('#e_hra').val(_this.find('.hra').text()));
            $('#e_conveyance').val(_this.find('.conveyance').text());
            $('#e_working_day').val(_this.find('.working_day').text());
            $('#e_allowance').val(_this.find('.allowance').text());
            // $('#e_working_day').val(_this.find('.working_day').text());
            $('#e_tds').val(_this.find('.tds').text());
            $('#e_esi').val(_this.find('.esi').text());
            $('#e_pf').val(_this.find('.pf').text());
            $('#e_short_leave').val(_this.find('.short_leave').text());
            $('#e_half_day').val(_this.find('.half_day').text());
            $('#e_leave').val(_this.find('.leave').text());
            $('#e_prof_tax').val(_this.find('.prof_tax').text());
            $('#e_tel_int').val(_this.find('.tel_int').text());
            $('#e_bonus').val(_this.find('.bonus').text());
            $('#e_wfh').val(_this.find('.wfh').text());
            $('#e_work_in_holidays_hours').val(_this.find('.work_in_holidays_hours').text());
            $('#e_work_in_holidays_days').val(_this.find('.work_in_holidays_days').text());
            $('#e_labour_welfare').val(_this.find('.labour_welfare').text());
            $('#e_gsalary').val(_this.find('.gsalary').text());
        });
    </script>

    <script>
        $(document).on('change', '#salary, #e_salary', function() {

            var ctc = parseInt($(this).val());

            var base_salary = parseInt(72);
            var basic_sal = (ctc * base_salary / 100);

            var hra = parseInt(20);
            var hra = (basic_sal * hra / 100);

            // var da_per = parseInt(20);
            // var da = (basic_sal * da_per / 100);

            // var lta_per = parseInt(15);
            // var lta = (basic_sal * lta_per / 100);

            var conveyance_per = parseInt(8);
            var conveyance = (basic_sal * conveyance_per / 100);

            // var med_conveyance_per = parseInt(5);
            // var med_conveyance = (basic_sal * med_conveyance_per / 100);



            if (ctc >= parseInt(15000)) {
                $("#pf, #e_pf").val('3600');
            } else {
                $("#pf, #e_pf").val((ctc * parseInt(24) / 100));
            }

            if (ctc > parseInt(21000)) {
                $("#esi, #e_esi").val(0);
            } else {
                $("#esi, #e_esi").val((ctc * parseInt(4) / 100));
            }



            $('#basic, #e_basic').val(basic_sal);
            $('#hra, #e_hra').val(hra);
            $('#conveyance, #e_conveyance').val(conveyance);
            $('#medical_allowance, #e_medical_allowance').val(med_conveyance);
            $('#da, #e_da').val(da);
            $('#allowance, #e_allowance').val(lta);

        });
    </script>

    <!-- epf acording to days of working -->

<script>
        $('#e_leave').on('input', function() {
            var work_in_holidays_days = $("#e_work_in_holidays_days").val();
            var work_in_holidays_hours = $("#e_work_in_holidays_hours").val();
            var half_day= $("#e_half_day").val();
            var short_leave = $("#e_short_leave").val();
            var wfh = $("#e_wfh").val();
            var gsalary = $("#e_gsalary").val();
            var leave= $("#e_leave").val();
            var salary = $("#e_salary").val();
            var day =  $("#e_working_day").val();
            var per_day_salary=(salary / day);
           var per_hour_salary=((per_day_salary/8));
           // var day_home=(day-wfh);
            //console.log(day);
            var work_in_holidays_days = (work_in_holidays_days * per_day_salary);
            var work_in_holidays_hours = ((work_in_holidays_hours/8) * per_day_salary);
            var wfhs = ((wfh * per_day_salary ) / 2);
          
           if(short_leave >= 2){
                var short_leave = short_leave - 2;
                var short_salary = ((short_leave/8) * per_day_salary);
                //console.log(short_salary);
           }
           else{
            var short_salary=parseInt(short_leave);
            //console.log(short_salary);
           }
          if(half_day >= 4){
           
            var half_day =((per_hour_salary * half_day));
                //console.log(half_day);
          }

        else{
            var half_day=parseInt(half_day);
        }


            //console.log(wfh);
            if (leave >= 1) {
                
                var leave = leave - 1;
            var days = (day - leave);
            console.log(days);
            }
            else {
                var day = parseInt(day);
                
                var days = day + 1;
                  //console.log(days);
                 
            }
            var day=(days-wfh)
            
            var tsalary=Math.round((per_day_salary * day) + work_in_holidays_days + work_in_holidays_hours + wfhs );
            console.log(tsalary);
           
            var gsalary = Math.round(tsalary - short_salary - half_day);
            console.log(gsalary);
            document.getElementById("e_gsalary").value = gsalary;
            if (gsalary >= parseInt(15000)) {
                console.log(gsalary);
                        $("#pf, #e_pf").val('3600');

                    } else {
                        $("#pf, #e_pf").val(Math.round((gsalary * parseInt(24) / 100).toFixed(2)));
                    }
                   
                    if (gsalary >parseInt(21000)) {
                        $("#esi, #e_esi").val(0);
                        console.log(gsalary);
                    } else {
                        console.log(gsalary);
                        $("#esi, #e_esi").val(Math.round((gsalary * parseInt(4) / 100)));
                    }
                   //console.log(salary);
 
});

</script>

@endsection
