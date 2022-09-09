<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Employee;
use App\Models\department;
use App\Models\User;
use App\Models\module_permission;
use App\Models\designation;

class EmployeeController extends Controller
{
    // all employee card view
    public function cardAllEmployee(Request $request)
    {

        $users = DB::table('employees')->get();
        $departments = department::all();
        return view('form.allemployeecard',compact('users','departments'));
    }
    // all employee list
    public function listAllEmployee()
    {
        $users = DB::table('employees')
            ->join('departments', 'employees.dept', '=', 'departments.id')
            ->join('designation', 'employees.desg', '=', 'designation.id')
            ->select('employees.*',  'designation.designation as designation','departments.department as department')
            ->get();
        $departments = department::all();
        return view('form.employeelist',compact('users','departments'));
    }

    // save data employee
    public function saveRecord(Request $request)
    {

         $request->validate([
             'name'        => 'required|string|max:255',
             'empid'      => 'required',
             'ctc'      => 'required',
             'desg'        => 'required',
             'dept'        => 'required',
             'email'       => 'required|string|email|unique:employees,email',
             'contact'     => 'required|regex:/[0-9]{10}/',

         ]);

         DB::beginTransaction();
         try{

             $employees = Employee::where('email', '=',$request->email)->first();
             if ($employees === null)
             {
                if($request->employee_pic){
                $name = $request->file('employee_pic')->store('public/uploads');
                $o_name = str_replace('public/uploads/', '', $name);
                }else{
                    $o_name = '';
                }
                $employee = new employee;
                $employee->name         = $request->name;
                $employee->employee_id      = $request->empid;
                $employee->ctc      = $request->ctc;
                $employee->desg        = $request->desg;
                $employee->dept       = $request->dept;
                $employee->doj       = $request->doj;
                $employee->pan       = $request->pan;
                $employee->uan      = $request->uan;
                $employee->esi     = $request->esi;
                $employee->pran     = $request->pran;
                $employee->email        = $request->email;
                $employee->birth_date   = $request->birthDate;
                $employee->gender       = $request->gender;
                $employee->image        =$o_name;
                $employee->contact        = $request->contact;
                $employee->account_no = $request->acc_no;
                $employee->ifsc = $request->ifsc;
                $employee->save();



                 DB::commit();
                 Toastr::success('Add new employee successfully :)','Success');
                 return redirect()->route('all/employee/card');
             } else {
                 DB::rollback();
                 Toastr::error('Add new employee exits :)','Error');
                 return redirect()->back();
             }
         }catch(\Exception $e){
             DB::rollback();
             Toastr::error('Add new employee fail :)','Error');
             return redirect()->back();
         }
    }
    // view edit record
    public function viewRecord($employee_id)
    {
        $employees = DB::table('employees')
            ->join('designation', 'employees.desg', '=', 'designation.id')
            ->select('employees.*',  'designation.designation as designation')
            ->where('employees.id','=',$employee_id)
            ->get();
        $department = DB::table('departments')->get();
        $designation = DB::table('designation')->get();
        return view('form.edit.editemployee',compact('employees', 'department', 'designation'));
    }
    // update record employee
    public function updateRecord( Request $request)
    {


        DB::beginTransaction();
        try{
            // update table Employee
            if($request->employee_pic){
            $name = $request->file('employee_pic')->store('public/uploads');
                $o_name = str_replace('public/uploads/', '', $name);
            }else{
                $o_name = $request->prev_img;
            }
            $updateEmployee = [
                'id'=>$request->id,
                'name'=>$request->name,

             'employee_id'      => $request->empid,
             'desg'        => $request->desg,
             'dept'        => $request->dept,
             'doj'         => $request->doj,
             'pan'         => $request->pan,
             'uan'         => $request->uan,
             'esi'         => $request->esi,
             'pran'        => $request->pran,
             'email'       => $request->email,
             'birth_date'   => $request->birth_date,
             'gender'      => $request->gender,
             'image'     => $o_name,
             'contact'     => $request->contact,
             'account_no' => $request->acc_no,
             'ifsc' => $request->ifsc
            ];

            $affecte_row = Employee::where('id',$request->id)->update($updateEmployee);
echo $affecte_row;
            if($affecte_row != 0){

            DB::commit();
            Toastr::success('updated record successfully :)','Success');
            }
            return redirect()->route('all/employee/card');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('updated record fail :)','Error');
            return redirect()->back();
        }
    }
    // delete record
    public function deleteRecord($employee_id)
    {
        DB::beginTransaction();
        try{

            Employee::where('id',$employee_id)->delete();


            DB::commit();
            Toastr::success('Delete record successfully :)','Success');
            return redirect()->route('all/employee/card');

        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Delete record fail :)','Error');
            return redirect()->back();
        }
    }
    // employee search
    public function employeeSearch(Request $request)
    {
        $users = DB::table('employees')
        ->join('departments', 'employees.dept', '=', 'departments.id')
        ->join('designation', 'employees.desg', '=', 'designation.id')
        ->select('employees.*', 'departments.department as department', 'designation.designation as designation')

        ->get();
        $departments = department::all();


        // search by id
        if($request->employee_id)
        {
            $users = DB::table('employees')
                        ->join('departments', 'employees.dept', '=', 'departments.id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*', 'departments.department as department', 'designation.designation as designation')
                        ->where('employees.employee_id','LIKE','%'.$request->employee_id.'%')
                        ->get();
                        $departments = department::all();
        }
        // search by name
        if($request->name)
        {
            $users = DB::table('employees')
                        ->join('departments', 'employees.dept', '=', 'departments.id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*', 'departments.department as department','designation.designation as designation')
                        ->where('employees.name','LIKE','%'.$request->name.'%')
                        ->get();

                        $departments = department::all();
        }

        // search by name and id
        if($request->employee_id && $request->name)
        {
            $users = DB::table('employees')
                        ->join('departments', 'employees.dept', '=', 'departments.id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*', 'departments.department as department', 'designation.designation as designation')
                        ->where('employees.employee_id','LIKE','%'.$request->employee_id.'%')
                        ->where('employees.name','LIKE','%'.$request->name.'%')
                        ->get();
                        $departments = department::all();
        }
        return view('form.allemployeecard',compact('users','departments'));
    }
    public function employeeListSearch(Request $request)
    {
        $users = DB::table('employees')
        ->join('departments', 'employees.dept', '=', 'departments.id')
        ->join('designation', 'employees.desg', '=', 'designation.id')
        ->select('employees.*', 'departments.department as department', 'designation.designation as designation')
       ->get();
        $departments = department::all();


        // search by id
        if($request->employee_id)
        {
            $users = DB::table('employees')
                        ->join('departments', 'employees.dept', '=', 'departments.id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*', 'departments.department as department', 'designation.designation as designation')
                        ->where('employees.employee_id','LIKE','%'.$request->employee_id.'%')
                        ->get();
                        $departments = department::all();
        }
        // search by name
        if($request->name)
        {
            $users = DB::table('employees')
                        ->join('departments', 'employees.dept', '=', 'departments.id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*', 'departments.department as department','designation.designation as designation')
                        ->where('employees.name','LIKE','%'.$request->name.'%')
                        ->get();

                        $departments = department::all();
        }

        // search by name and id
        if($request->employee_id && $request->name)
        {
            $users = DB::table('employees')
                        ->join('departments', 'employees.dept', '=', 'departments.id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*', 'departments.department as department', 'designation.designation as designation')
                        ->where('employees.employee_id','LIKE','%'.$request->employee_id.'%')
                        ->where('employees.name','LIKE','%'.$request->name.'%')
                        ->get();
                        $departments = department::all();
        }

        return view('form.employeelist',compact('users', 'departments'));
    }

    // employee profile
    public function profileEmployee($id)
    {
        $users = DB::table('employees')
                ->join('departments', 'employees.dept', '=', 'departments.id')
                ->join('designation', 'employees.desg', '=', 'designation.id')
                ->select('employees.*', 'departments.department as dept', 'designation.designation as desg')
                ->where('employees.id','=', $id)
                ->first();

        return view('form.employeeprofile',compact('users'));
    }
    /** page departments */
    public function index()
    {
        $departments = DB::table('departments')->get();
        return view('form.departments',compact('departments'));
    }

    /** save record department */
    public function saveRecordDepartment(Request $request)
    {
        $request->validate([
            'department'        => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try{

            $department = department::where('department',$request->department)->first();
            if ($department === null)
            {
                $department = new department;
                $department->department = $request->department;
                $department->save();

                DB::commit();
                Toastr::success('Add new department successfully :)','Success');
                return redirect()->route('form/departments/page');
            } else {
                DB::rollback();
                Toastr::error('Add new department exits :)','Error');
                return redirect()->back();
            }
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Add new department fail :)','Error');
            return redirect()->back();
        }
    }

    /** update record department */
    public function updateRecordDepartment(Request $request)
    {
        DB::beginTransaction();
        try{
            // update table departments
            $department = [
                'id'=>$request->id,
                'department'=>$request->department,
            ];
            department::where('id',$request->id)->update($department);

            DB::commit();
            Toastr::success('updated record successfully :)','Success');
            return redirect()->route('form/departments/page');
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('updated record fail :)','Error');
            return redirect()->back();
        }
    }

    /** delete record department */
    public function deleteRecordDepartment(Request $request)
    {
        try {

            department::destroy($request->id);
            DB::table('designation')
            ->where('dept_id','=',$request->id)->delete();
            Toastr::success('Department deleted successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Department delete fail :)','Error');
            return redirect()->back();
        }
    }

    /** page designations */
    public function designationsIndex()
    {
        return view('form.designations');
    }

    /** page time sheet */
    public function timeSheetIndex()
    {
        return view('form.timesheet');
    }

    /** page overtime */
    public function overTimeIndex()
    {
        return view('form.overtime');
    }
    public function del_img($id){
        Employee::where('id', $id)
    //   ->where('destination', 'San Diego')
      ->set(['image' => ''])
      ->update();
      return true;
    }

}
