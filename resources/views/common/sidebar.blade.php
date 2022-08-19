<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a class="active" href="{{ route('home') }}" class="noti-dot">
                        <i class="la la-dashboard"></i>
                        <span> Dashboard</span>
                    </a>
                    {{-- <ul style="display: none;">
                        <li><a  href="{{ route('home') }}">Admin Dashboard</a></li>
                        <li><a href="{{ route('em/dashboard') }}">Employee Dashboard</a></li>
                    </ul> --}}
                </li>



                <li >
                    <a href="{{ route('designation') }}">
                        <i class="la la-graduation-cap"></i> <span> Designation</span>
                    </a>
                </li>
                <li >
                    <a href="{{ route('form/departments/page') }}">
                        <i class="la la-briefcase"></i> <span> Department</span>
                    </a>
                </li>
                <li >
                    <a href="{{ route('all/employee/card') }}">
                        <i class="la la-user"></i> <span> Employees</span>
                    </a>
                </li>

                <li class="">
                    {{-- <a href="#"><i class="la la-money"></i> --}}
                    {{-- <span> Payroll </span> </a>
                    <ul style="display: none;">
                        <li><a href="{{ route('form/salary/page') }}"> Employee Salary </a></li>
                        <li><a href="{{ url('form/salary/view') }}"> Payslip </a></li>
                        <li><a href="{{ route('form/payroll/items') }}"> Payroll Items </a></li>
                    </ul> --}}
                    <a href="{{ route('form/salary/page') }}">
                        <i class="la la-money"></i> <span> Payroll</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
