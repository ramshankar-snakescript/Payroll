<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\StaffSalary;
use App\Models\Employee;
use Brian2694\Toastr\Facades\Toastr;

class PayrollController extends Controller
{
    // view page salary
    public function salary()
    {

        $users = DB::table('employees')
                    ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                    ->join('designation', 'employees.desg', '=', 'designation.id')
                    ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
                    ->get();
        $userList = DB::table('employees')->get();
        // $permission_lists = DB::table('permission_lists')->get();
        return view('payroll.employeesalary', compact('users', 'userList'));
    }

    // save record
     public function saveRecord(Request $request)
     {
        // echo '<pre>';
        // print_r($request->all());
        // exit();
        $request->validate([
            'name'         => 'required|string|max:255',
            'salary'       => 'required|string|max:255',
            'basic' => 'required|string|max:255',
            // 'da'    => 'required|string|max:255',
            'hra'    => 'required|string|max:255',
            // 'conveyance' => 'required|string|max:255',
            'allowance'  => 'required|string|max:255',
            'medical_allowance' => 'required|string|max:255',
            'tds' => 'required|string|max:255',
            'esi' => 'required|string|max:255',
            'pf'  => 'required|string|max:255',
            'leave'    => 'required|string|max:255',
            // 'prof_tax' => 'required|string|max:255',
            'labour_welfare' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $salary = StaffSalary::updateOrCreate(['rec_id' => $request->rec_id]);
            $salary->name              = $request->name;
            $salary->rec_id            = $request->rec_id;
            $salary->salary            = $request->salary;
            $salary->basic             = $request->basic;
            // $salary->da                = $request->da;
            $salary->hra               = $request->hra;
            // $salary->conveyance        = $request->conveyance;
            $salary->allowance         = $request->allowance;
            $salary->medical_allowance = $request->medical_allowance;
            $salary->tds               = $request->tds;
            $salary->esi               = $request->esi;
            $salary->pf                = $request->pf;
            $salary->leave             = $request->leave;
            // $salary->prof_tax          = $request->prof_tax;
            $salary->labour_welfare    = $request->labour_welfare;
            $salary->save();

            DB::commit();
            Toastr::success('Create new Salary successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Salary fail :)','Error');
            return redirect()->back();
        }
     }

    // salary view detail
    public function salaryView($rec_id)
    {
        $users = DB::table('employees')
                ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                ->join('designation', 'employees.desg', '=', 'designation.id')
                ->select('employees.*','employees.name as naam', 'staff_salaries.*','designation.designation as designation')
                ->where('staff_salaries.rec_id',$rec_id)
                ->first();
        return view('payroll.salaryview',compact('users'));
    }

    // update record
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try{
            $update = [

                'id'      => $request->id,
                'name'    => $request->name,
                'salary'  => $request->salary,
                'basic'   => $request->basic,
                // 'da'      => $request->da,
                'hra'     => $request->hra,
                // 'conveyance' => $request->conveyance,
                'allowance'  => $request->allowance,
                'medical_allowance'  => $request->medical_allowance,
                'tds'  => $request->tds,
                'esi'  => $request->esi,
                'pf'   => $request->pf,
                'leave'     => $request->leave,
                // 'prof_tax'  => $request->prof_tax,
                'labour_welfare'  => $request->labour_welfare,
            ];


            StaffSalary::where('id',$request->id)->update($update);
            DB::commit();
            Toastr::success('Salary updated successfully :)','Success');
            return redirect()->back();

        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Salary update fail :)','Error');
            return redirect()->back();
        }
    }

    // delete record
    public function deleteRecord(Request $request)
    {
        DB::beginTransaction();
        try {

            StaffSalary::destroy($request->id);

            DB::commit();
            Toastr::success('Salary deleted successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Salary deleted fail :)','Error');
            return redirect()->back();
        }
    }

    // payroll Items
    public function payrollItems()
    {
        return view('payroll.payrollitems');
    }

    public function search(Request $request){


        $users = DB::table('employees')
                    ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                    ->join('designation', 'employees.desg', '=', 'designation.id')
                    ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
                    ->get();
        $userList = DB::table('employees')->get();

        // search by id
        // if($request->employee_id)
        // {
        //     $users = DB::table('employees')
        //                 ->join('departments', 'employees.dept', '=', 'departments.id')
        //                 ->join('designation', 'employees.desg', '=', 'designation.id')
        //                 ->select('employees.*', 'departments.department as department', 'designation.designation as designation')
        //                 ->where('employees.employee_id','LIKE','%'.$request->employee_id.'%')
        //                 ->get();
        //                 $departments = department::all();
        // }
        // search by name
        if($request->name)
        {

            $users = DB::table('employees')
                    ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                    ->join('designation', 'employees.desg', '=', 'designation.id')
                    ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
                    ->where('employees.name','LIKE','%'.$request->name.'%')
                    ->get();
        $userList = DB::table('employees')->get();

        }

       // search by From date
        if($request->f_date)
        {
            $newDate = date("Y/m/d", strtotime($request->f_date));
            $users = DB::table('employees')
                        ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
                        ->where('staff_salaries.created_at','>',$newDate)
                        ->get();
            $userList = DB::table('employees')->get();
        }

        // search by To_date
        if($request->t_date)
        {
            $toDate = date("Y/m/d", strtotime($request->t_date));
            $users = DB::table('employees')
                        ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
                        ->where('staff_salaries.created_at','<=',$toDate)
                        ->get();
            $userList = DB::table('employees')->get();
        }


        // search by From_date & To_date
        if($request->t_date && $request->f_date)
        {
            $fromDate = date("Y/m/d", strtotime($request->f_date));
            $toDate = date("Y/m/d", strtotime($request->t_date));
            $users = DB::table('employees')
                        ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
                        // ->where('staff_salaries.created_at','<=',$toDate)
                        ->whereBetween('staff_salaries.created_at', [$fromDate, $toDate])
                        ->get();
            $userList = DB::table('employees')->get();
        }

         // search by Name & From_date & To_date
         if($request->name && $request->t_date && $request->f_date)
         {
             $fromDate = date("Y/m/d", strtotime($request->f_date));
             $toDate = date("Y/m/d", strtotime($request->t_date));
             $users = DB::table('employees')
                         ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                         ->join('designation', 'employees.desg', '=', 'designation.id')
                         ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
                         ->where('employees.name','LIKE','%'.$request->name.'%')
                         ->whereBetween('staff_salaries.created_at', [$fromDate, $toDate])
                         ->get();
             $userList = DB::table('employees')->get();
         }
        return view('payroll.employeesalary', compact('users', 'userList'));
    }
}
