<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Mail;
use App\Mail\OrderShipped;
use App\Models\StaffSalary;
use App\Models\Employee;
use Brian2694\Toastr\Facades\Toastr;
use PDF;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


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
        return view('payroll.employeesalary', compact('users', 'userList'));
    }

    // save record
     public function saveRecord(Request $request)
     {
        $request->validate([
            'name'   => 'required',
            'salary' => 'required|string|max:255',
            'dos'   => 'required',
            'working_day'=> 'required',
            'leave'=> 'required',
        ]);

        DB::beginTransaction();
        try {
            // $salary = StaffSalary::updateOrCreate(['rec_id' => $request->rec_id]);
          $emp =   DB::table('staff_salaries')
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('name', '=' , $request->name)
            ->count();

            if($emp > 0){
                $name = DB::table('employees')
                    ->select('name')
                    ->where('id', '=' , $request->name)
                    ->get();
                Toastr::error('Salary slip for '.Carbon::now()->format('F').' of '.$name[0]->name.' has already been Created. :)','Error');
                return redirect(url('form/salary/page'));
            }else{

            $salary = new StaffSalary;
            
            $salary->name              = $request->name;
            $salary->rec_id            = $request->rec_id;
            $salary->dos            = $request->dos;
            $salary->salary            = $request->salary;
            $salary->basic             = $request->basic;
            $salary->da                = $request->da;
            $salary->hra               = $request->hra;
            $salary->conveyance        = $request->conveyance;
            $salary->working_day         = $request->working_day;
            $salary->medical_allowance = $request->medical_allowance;
            $salary->telephone_internet= $request->tel_int;
            $salary->bonus             = $request->bonus;
            $salary->wfh               = $request->wfh;
           
            $salary->work_in_holidays_days  = $request->work_in_holidays_days;
            $salary->work_in_holidays_hours  = $request->work_in_holidays_hours;
            $salary->extra_hours  = $request->extra_hours;
            $salary->tds               = $request->tds;
            $salary->esi               = $request->esi;
            $salary->pf                = $request->pf;
            $salary->short_leave       = $request->short_leave;
            $salary->half_day       = $request->half_day;
            $salary->leave             = $request->leave;
            $salary->labour_welfare    = $request->labour_welfare;
             $salary->gsalary               = $request->gsalary;
            $salary->save();
           DB::commit();
            Toastr::success('Create new Salary successfully :)','Success');
           }

            return redirect(url('form/salary/view/'.$salary->id));
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Salary fail :)','Error');
            // return redirect()->route('form/salary/page');
            return redirect()->url('form/salary/view/'.$request->rec_id);
        }
     }

    // salary view detail
    public function salaryView($id)
    {
        $users = DB::table('employees')
                ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                ->join('designation', 'employees.desg', '=', 'designation.id')
                ->join('departments', 'employees.dept', '=', 'departments.id')
                ->select('employees.*','employees.name as naam', 'staff_salaries.*','designation.designation as designation','departments.department as department')
                ->where('staff_salaries.id',$id)
                ->first();
        return view('payroll.salaryview',compact('users'));
    }

    // update record
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try{
            $update = [

                'id'                 => $request->id,
                'salary'             => $request->salary,
                'dos'             => $request->dos,
                'basic'              => $request->basic,
                'da'                 => $request->da,
                'hra'                => $request->hra,
                'conveyance'         => $request->conveyance,
                'allowance'          => $request->allowance,
                'working_day'        => $request->working_day,
                'medical_allowance'  => $request->medical_allowance,
                'telephone_internet' => $request->tel_int,
                'bonus'                => $request->bonus,
                'wfh'                => $request->wfh,
                'work_in_holidays_days' => $request->work_in_holidays_days,
                'work_in_holidays_hours' => $request->work_in_holidays_hours,
                'tds'                => $request->tds,
                'esi'                => $request->esi,
                'pf'                 => $request->pf,
                'short_leave'        => $request->short_leave,
                'half_day'        => $request->half_day,
                'leave'              => $request->leave,
                // 'prof_tax'  => $request->prof_tax,
                'labour_welfare'  => $request->labour_welfare,
                'gsalary'   => $request->gsalary,
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


    public function search(Request $request){
    // search by name and to and from date
        if($request->name && $request->f_date && $request->t_date)
        {
            $fromDate = date("Y-m-d", strtotime($request->f_date));
            $toDate = date("Y-m-d", strtotime($request->t_date));
            $users = DB::table('employees')
                        ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
                        ->where('employees.id','=',$request->name)
                        ->whereBetween('staff_salaries.created_at', [$fromDate, $toDate])
                        ->get();
            $userList = DB::table('employees')->get();
        }elseif($request->t_date && $request->f_date)
        {
           
            $fromDate = date("Y-m-d", strtotime($request->f_date));
            $toDate = date("Y-m-d", strtotime($request->t_date));
            $users = DB::table('employees')
                        ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
                        // ->where('staff_salaries.created_at','<=',$toDate)
                        ->whereBetween('staff_salaries.created_at', [$fromDate, $toDate])
                        ->get();
            $userList = DB::table('employees')->get();
        }
        elseif($request->f_date)
         {
         
            $newDate = date("Y-m-d", strtotime($request->f_date));
            $users = DB::table('employees')
                        ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
                        ->where('staff_salaries.created_at','>',$newDate)
                        ->get();
            $userList = DB::table('employees')->get();
        }elseif($request->t_date)
        {
          
            $toDate = date("Y-m-d", strtotime($request->t_date));
            $users = DB::table('employees')
                        ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
                        ->where('staff_salaries.created_at','<=',$toDate)
                        ->get();
            $userList = DB::table('employees')->get();
        }elseif($request->name){
            
            $users = DB::table('employees')
                    ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                    ->join('designation', 'employees.desg', '=', 'designation.id')
                    ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
                    ->where('employees.id','=',$request->name)
                    ->get();
        $userList = DB::table('employees')->get();
         }else{
            $users = DB::table('employees')
            ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
            ->join('designation', 'employees.desg', '=', 'designation.id')
            ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
            ->get();
$userList = DB::table('employees')->get();
         }
      
        
        return view('payroll.employeesalary', compact('users', 'userList'));
    }




     public function send_pdf($id){
         // Dispatch the job to the queue
   
        $users = DB::table('employees')
                        ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
                        ->join('designation', 'employees.desg', '=', 'designation.id')
                        ->join('departments', 'employees.dept', '=', 'departments.id')
                        ->select('employees.*','employees.name as naam', 'staff_salaries.*','designation.designation as designation','departments.department as department')
                        ->where('staff_salaries.id',$id)
                        ->first();
                        if ($users) {
                            // Update the is_send value to 1
                            DB::table('staff_salaries')->where('id', $id)->update(['is_send' => 1]);
                        }
        $userList = DB::table('employees')->get();

        $pdf = PDF::loadview('payroll.salarypdf', compact('users'));
        $date = $users->dos; $newDate = date('F', strtotime($date));
        $path = Storage::put('public/'.$users->naam.'-'.$newDate.'Salary Slip'.'.'.'pdf', $pdf->output());
        $name = $users->naam.'_'.$newDate.'_Salary Slip'.'.'.'pdf';
        Storage::put($path, $pdf->output());
        // Mail::send('payroll.salaryslip', compact('users'), function ($m) use($users, $pdf, $path, $name){
        //     $m->From("ramshankar@snakescript.com", env('Snakescript Solutions LLP'));
        //     $m->to($users->email)->subject('Test Mail')
        //     ->attachData($pdf->output(),  $name);
        // });
         Mail::send('text.mail', compact('users'), function ($m) use($users, $pdf, $path, $name){
            $m->From("jasmeen@snakescript.com", env('Snakescript Solutions LLP'));
            $m->to($users->email)->subject('SalarySlip')
            ->attachData($pdf->output(),  $name);
        });


        Toastr::success('Email Sent Successfully :)','Success');

        // $users = DB::table('employees')
        //             ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
        //             ->join('designation', 'employees.desg', '=', 'designation.id')
        //             ->select('employees.*','employees.name as emp_name','employees.id as emp_id', 'staff_salaries.*', 'designation.designation as designation')
        //             ->get();
        // $userList = DB::table('employees')->get();

        return redirect()->route('form/salary/page');
     }


    

     public function get_salary($id){
        $data = DB::table("employees")
        ->where('id','=',$id)
        ->select('ctc')
        ->get();

       return $data;
     }
}
