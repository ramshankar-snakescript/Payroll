
@extends('layouts.master')
@section('content')
    <!-- Sidebar -->

    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-lists-center">
                    <div class="col">
                        <h3 class="page-title">Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" id="add" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
                        <div class="view-icons">
                            <a href="{{ route('all/employee/card') }}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                            <a href="{{ route('all/employee/list') }}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>


			<!-- /Page Header -->

            <!-- Search Filter -->
            <form action="{{ route('all/employee/search') }}" method="POST">
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
                            <input type="text" class="form-control floating" name="name">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        {{-- <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="position">
                            <label class="focus-label">Position</label>
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
            <div class="row staff-grid-row">




                @foreach ($users as $lists)
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a href="{{ url('employee/profile/'.$lists->id) }}" class="avatar">
                                @if($lists->image)
                                <img src="{{URL('storage/uploads/'.$lists->image) }}" >
                                @else
                                <img src="{{URL('storage/user.png') }}" >
                                @endif
                            </a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ url('all/employee/view/edit/'.$lists->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="{{url('all/employee/delete/'.$lists->id)}}"onclick="return confirm('Are you sure to want to delete it?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

                            </div>
                        </div>
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">{{ $lists->name }}</a></h4>
                        {{-- <div class="small text-muted">{{ $lists->position }}</div> --}}
                    </div>
                </div>
                @endforeach

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
                                        <label class="col-form-label">Employee Name <span class="text-danger">*</span></label>
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
                                        <label class="col-form-label">Employee id <span class="text-danger">*</span></label>
                                       <input class="form-control" type="text" name="empid" placeholder="Employee's id">
                                    </div>
                                    <span class="text-danger">
                                        @error('name')
                                    {{$message}}
                                @enderror
                                </span>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">CTC <span class="text-danger">*</span></label>
                                       <input class="form-control" type="text" name="ctc" placeholder="Employee's CTC">
                                    </div>
                                    <span class="text-danger">
                                        @error('ctc')
                                    {{$message}}
                                @enderror
                                </span>
                                </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
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
                                            <label>Designation <span class="text-danger">*</span></label>
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
                                            <label class="col-form-label">Contact No.<span class="text-danger">*</span></label>
                                            <input class="form-control" type="tel" pattern="[0-9]{10}" name="contact" placeholder="Employee Contact No.">
                                            <span class="text-danger">
                                                @error('contact')
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

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Date Of Joining </label>
                                            <input class="form-control" type="date"  name="doj" placeholder="Email" >
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">PAN No. </label>
                                            <input class="form-control" type="text" id="" name="pan" placeholder="PAN No." >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">UAN </label>
                                            <input class="form-control" type="text" id="" name="uan" placeholder="UAN" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">ESI Number </label>
                                            <input class="form-control" type="text" id="" name="esi" placeholder="ESI No." >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">PRAN </label>
                                            <input class="form-control" type="text" id="" name="pran" placeholder="PRAN" >
                                        </div>
                                    </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id="birthDate" name="birthDate" placeholder="dd-mm-yyyy">
                                        </div>
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
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee Profile Picture </label>
                                        <input type="file" class="form-control" name="employee_pic" placeholder="Profile Picture" >
                                    </span>
                                    </div>
                                </div>

                              <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Bank Account No. </label>
                                        <input class="form-control" type="text" id="" name="acc_no" placeholder="Account No." >
                                    </div>
                                </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">IFSC Code</label>
                                    <input class="form-control" type="text" id="" name="ifsc" placeholder="IFSC Code" >
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
        $(document).ready(function() {
            $('.select2s-hidden-accessible').select2({
                closeOnSelect: false
            });
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
    {{-- update js --}}
    <script>
        $(document).on('click','.userUpdate',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_name').val(_this.find('.name').text());
            $('#e_email').val(_this.find('.email').text());
            $('#e_phone_number').val(_this.find('.phone_number').text());
            $('#e_image').val(_this.find('.image').text());

            var name_role = (_this.find(".role_name").text());
            var _option = '<option selected value="' + name_role+ '">' + _this.find('.role_name').text() + '</option>'
            $( _option).appendTo("#e_role_name");

            var position = (_this.find(".position").text());
            var _option = '<option selected value="' +position+ '">' + _this.find('.position').text() + '</option>'
            $( _option).appendTo("#e_position");

            var department = (_this.find(".department").text());
            var _option = '<option selected value="' +department+ '">' + _this.find('.department').text() + '</option>'
            $( _option).appendTo("#e_department");

            var statuss = (_this.find(".statuss").text());
            var _option = '<option selected value="' +statuss+ '">' + _this.find('.statuss').text() + '</option>'
            $( _option).appendTo("#e_status");

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
        <script>
            // var id= 1;
            // $("#add").click(function(){

            //     $("#empid").val('snk_00'+id);

            // });
        </script>
    @endsection

@endsection
