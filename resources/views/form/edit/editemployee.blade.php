
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
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Employee View</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee View Edit</li>
                        </ul>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Employee edit</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('all/employee/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" id="id" name="id" value="{{ $employees[0]->id }}">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Full Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $employees[0]->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Employee id</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="empid" value="{{ $employees[0]->employee_id }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">CTC</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" readonly name="empid" value="{{ $employees[0]->ctc }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Department</label>
                                    <div class="col-md-10">
                                        <select class="select form-control" id="dept" name="dept">
                                            {{-- <option value="{{ $employees[0]->dept }}" {{ ( $employees[0]->gender == $employees[0]->gender) ? 'selected' : '' }}>{{ $employees[0]->department }} </option> --}}
                                                @foreach ($department as $d)
                                                    <option value="{{$d->id}}" {{ ($d->id == $employees[0]->dept) ? 'selected' : '' }}>{{$d->department}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Designation</label>
                                    <div class="col-md-10">
                                        <select class="select form-control" id="designation" name="desg">
                                            {{-- <option value="{{ $employees[0]->gender }}" {{ ( $employees[0]->gender == $employees[0]->gender) ? 'selected' : '' }}>{{ $employees[0]->gender }} </option> --}}

                                            <option value="{{$employees[0]->desg}}">{{$employees[0]->designation}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Contact</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="company" name="contact" value="{{ $employees[0]->contact }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $employees[0]->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Date Of Joining</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control datetimepicker" id="email" name="doj" value="{{ $employees[0]->doj }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">PAN No.</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="pan" value="{{ $employees[0]->pan }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">UAN</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="uan" value="{{ $employees[0]->uan }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">PRAN</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="pran" value="{{ $employees[0]->pran }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Birth Date</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control datetimepicker" id="birth_date" name="birth_date" value="{{ $employees[0]->birth_date }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Gender</label>
                                    <div class="col-md-10">
                                        <select class="select form-control" id="gender" name="gender">
                                            <option value="{{ $employees[0]->gender }}" {{ ( $employees[0]->gender == $employees[0]->gender) ? 'selected' : '' }}>{{ $employees[0]->gender }} </option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Image</label>
                                    <div class="col-md-10" id="img">
                                        <img style="height:200px;" src="{{url('storage/uploads/')."/".$employees[0]->image}}">
                                        <div class="staff-msg"><a id="ch_img"  class="btn btn-custom" data-id={{$employees[0]->id}}>Change Image</a></div>
                                        <input type="hidden" name="prev_img" id="prev_img" value={{$employees[0]->image}}>
                                    </div>
                                    <div class="col-md-10" id="input_file">
                                        <input type="file" class="form-control" name="employee_pic" placeholder="Profile Picture" >
                                        <span class="text-danger">
                                            @error('employee_pic')
                                        {{$message}}
                                    @enderror
                                    </span>
                                </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Account No.</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="" name="birth_date" value="{{ $employees[0]->account_no }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">IFSC Code</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control " id="" name="birth_date" value="{{ $employees[0]->ifsc }}">
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
        <!-- /Page Content -->

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
                    $(document).ready(function(){
                        if($("#prev_img").val()==''){
                        $("#input_file").show();
                        $("#img").hide();
                        }else{
                        $("#input_file").hide();
                        }
                    });

                    $("#ch_img").click( function(){
                        var r = confirm('Are you sure?');
                        if(r == true){
                        var id = $(this).data('id');
                        $("#input_file").show();
                        $("#img").hide();
                        $.ajax({
                type: "GET",
                url:
                     "{{url('del_img')}}"+'/'+id,

                contentType: "application/json",
                dataType: "json",

                success: function(response) {
                        alert('deleted');
                        // $('#designation').find('option').remove();
                        // $.each(response, function (key, value) {
                        //     $("#designation").append(new Option(value.designation, value.id));
                        // });
                    },
                    error: function(response) {
                        console.log(response);
                    }
            });
    }
                    })


                </script>
    @endsection

@endsection
