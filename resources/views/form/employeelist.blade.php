@extends('layouts.master')
@section('content')
    <!-- Sidebar -->


    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
                        <div class="view-icons">
                            <a href="{{ route('all/employee/card') }}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                            <a href="{{ route('all/employee/list') }}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->

            <!-- Search Filter -->
            <form action="{{ route('all/employee/list/search') }}" method="POST">
                @csrf
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="employee_id">
                            <label class="focus-label">Employee ID</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" name="name" class="form-control floating">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        {{-- <div class="form-group form-focus">
                            <input type="text" name="desg" class="form-control floating">
                            <label class="focus-label">Designation</label>
                        </div> --}}
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button type="sumit" class="btn btn-success btn-block"> Search </button>
                    </div>
                </div>
            </form>
            <!-- Search Filter -->
            {{-- message --}}
            {!! Toastr::message() !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Employee ID</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th class="text-nowrap">Join Date</th>
                                    {{-- <th>Role</th> --}}
                                    <th class="text-right no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $items )
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="{{ url('employee/profile/'.$items->id) }}" class="avatar">
                                                @if(!empty($items->image))
                                                <img alt="" src="{{ URL('storage/uploads/'. $items->image) }}">
                                                @else
                                                <img src="{{URL('storage/user.png') }}" >
                                                @endif
                                            </a>
                                            <a href="{{ url('employee/profile/'.$items->id) }}">{{ $items->name }}<span>{{ $items->designation }}</span></a>
                                        </h2>
                                    </td>
                                    <td>{{ $items->employee_id }}</td>
                                    <td>{{ $items->email }}</td>
                                    <td>{{ $items->contact }}</td>
                                    <td>{{ $items->doj }}</td>
                                    <td>{{ $items->department }}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ url('all/employee/view/edit/'.$items->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="{{url('all/employee/delete/'.$items->id)}}"onclick="return confirm('Are you sure to want to delete it?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add Employee Modal -->
        <div id="add_employee" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title">Add Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" action="{{ route('all/employee/save') }}" method="POST">
                            @csrf
                            {{-- <input type="hidden" id="empid" name="emp"> --}}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee Name</label>
                                       <input class="form-control" type="text" name="name" placeholder="Employee's Name">
                                    </div>
                                    <span class="text-danger">
                                        @error('name')
                                    {{$message}}
                                @enderror
                                </span>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee id</label>
                                       <input class="form-control" type="text" name="empid" placeholder="Employee's id">
                                    </div>
                                    <span class="text-danger">
                                        @error('name')
                                    {{$message}}
                                @enderror
                                </span>
                                </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select class="select form-control" id="dept" style="width: 100%;" tabindex="-1" aria-hidden="true" id="gender" name="dept">
                                                <option SELECTED DISABLED>Select Department</option>
                                                @foreach ($departments as $dept)
                                                <option value="{{$dept->id}}">{{$dept->department}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <span class="text-danger">
                                            @error('desg')
                                                {{$message}}
                                            @enderror
                                         </span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <select class="select form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="designation" name="desg">
                                                <option>Select Designations</option>
                                            </select>
                                        </div>
                                        <span class="text-danger">
                                            @error('dept')
                                                {{$message}}
                                            @enderror
                                         </span>
                                    </div>



                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Date Of Joining <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date"  name="doj" placeholder="Email" >
                                            <span class="text-danger">
                                                @error('doj')
                                            {{$message}}
                                        @enderror
                                        </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">PAN No. <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="" name="pan" placeholder="PAN No." >
                                            <span class="text-danger">
                                                @error('pan')
                                            {{$message}}
                                        @enderror
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">UAN <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="" name="uan" placeholder="UAN" >
                                            <span class="text-danger">
                                                @error('uan')
                                            {{$message}}
                                        @enderror
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">ESI Number <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="" name="esi" placeholder="ESI No." >
                                            <span class="text-danger">
                                                @error('esi')
                                            {{$message}}
                                        @enderror
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">PRAN <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="" name="pran" placeholder="PRAN" >
                                            <span class="text-danger">
                                                @error('pran')
                                            {{$message}}
                                        @enderror
                                        </span>
                                        </div>
                                    </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" id="email" name="email" placeholder="Email" >
                                        <span class="text-danger">
                                            @error('email')
                                        {{$message}}
                                    @enderror
                                    </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id="birthDate" name="birthDate" placeholder="dd-mm-yyyy">
                                        </div>
                                        <span class="text-danger">
                                            @error('birthDate')
                                        {{$message}}
                                    @enderror
                                    </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="select form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="gender" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('gender')
                                            {{$message}}
                                        @enderror
                                     </span>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee Profile Picture <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="employee_pic" placeholder="Profile Picture" >
                                        <span class="text-danger">
                                            @error('employee_pic')
                                        {{$message}}
                                    @enderror
                                    </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Contact No.</label>
                                        <input class="form-control" type="tel" pattern="[0-9]{10}" name="contact" placeholder="Employee Contact No.">
                                        <span class="text-danger">
                                            @error('contact')
                                            {{$message}}
                                        @enderror
                                        </span>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bank Details</label><br>
                                        <textarea class="form-control" name="bank_details" rows="5" cols="45" name="bank_detail"></textarea>
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
        </div>
        <!-- /Add Employee Modal -->
    </div>
    <!-- /Page Wrapper -->
    @section('script')
    <script>
        $("input:checkbox").on('click', function()
        {
            var $box = $(this);
            if ($box.is(":checked"))
            {
                var group = "input:checkbox[class='" + $box.attr("class") + "']";
                $(group).prop("checked", false);
                $box.prop("checked", true);
            }
            else
            {
                $box.prop("checked", false);
            }
        });
    </script>
    <script>
        // select auto id and email
        $('#name').on('change',function()
        {
            $('#employee_id').val($(this).find(':selected').data('employee_id'));
            $('#email').val($(this).find(':selected').data('email'));
        });
    </script>
    <script>
        $("#dept").change(function(){
            // alert();
            var id =$("#dept option:selected").val();

            $.ajax({
                type: "GET",
                url:
                     "{{url('get_designation')}}"+'/'+id,

                contentType: "application/json",
                dataType: "json",

                success: function(response) {

                    $('#designation').find('option').remove();
                    $.each(response, function (key, value) {
                        $("#designation").append(new Option(value.designation, value.id));
                    });
                },
                error: function(response) {
                    console.log(response);
                }
        });


        })
                </script>
    @endsection
@endsection
