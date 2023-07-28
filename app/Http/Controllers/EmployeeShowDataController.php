<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Employee;
use App\Models\StaffSalary;
use App\Models\department;
use App\Models\User;
use App\Models\module_permission;
use App\Models\designation;
use Hash;
use Mail;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class EmployeeShowDataController extends Controller
{
    public function profileEmployee()
    {
        $email = Auth::user()->email;

        $users = DB::table('employees')
                ->join('departments', 'employees.dept', '=', 'departments.id')
                ->join('designation', 'employees.desg', '=', 'designation.id')
                ->select('employees.*','employees.name as emp_name', 'departments.department as dept', 'designation.designation as desg')
                ->where('employees.email','=', $email)
                ->first();
               
        $salary = DB::table('staff_salaries')
                ->where('rec_id', '=', $users->id)
                ->get();
      
       
        //return var_dump($users);
        return view('form.employeeprofile',compact('users', 'salary'));
    }
}
