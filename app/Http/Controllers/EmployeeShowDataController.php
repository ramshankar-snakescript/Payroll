<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Employee;
use App\Models\StaffSalary;
use App\Models\department;
use App\Models\User;
use App\Models\Contact;
use App\Models\Address;
use App\Models\Checkin;
use App\Models\Checkout;
use App\Models\Qualification;
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
    public function  Attendance(Request $request)
    {

        $users = DB::table('checkins')->get();
        $departments = Checkout::all();
        return view('dashboard.dashboard',compact('users','departments'));
    }


    public function profileEmployee()
    {
        $email = Auth::user()->email;
        //return var_dump( $email);
               
                $users = DB::table('employees')
               ->select('employees.*','employees.name as emp_name' )
                ->where('email', '=', $email)
                ->first();
        
              
                $salary = DB::table('staff_salaries')
                ->where('rec_id', '=', $users->id)
                ->get();

                $contacts = DB::table('contacts')
                ->select('contacts.*','contacts.relationship as relationship' )
                 ->where('email', '=', $email)
                 ->get();
       
      // return var_dump($contacts);
    return view('form.employeeshowprofile',compact('users','salary','contacts'));
    }

    //Update Personal Details

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
             'ctc'         => $request->ctc,
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
            return redirect()->route('home');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('updated record fail :)','Error');
            return redirect()->back();
        }
    }
// Add Emergencycontact
    public function Emergencycontact(Request $request)
    { DB::beginTransaction();
        try{
        $email = Auth::user()->email;
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->relationship = $request->relationship;
        $contact->mobile_number = $request->mobile_number;
        $contact->email=$email ;
        // Save the contact record in the database
        $contact->save();
        DB::commit(); // Commit the transaction after successful save
        Toastr::success('updated record successfully :)', 'Success');
        

          
        return redirect()->route('home');
 
    }catch(\Exception $e){
        DB::rollback();
        Toastr::error('updated record fail :)','Error');
        return redirect()->back();
    }
    }
    // Add Qualifications
    public function Qualifications(Request $request)
    { 
        DB::beginTransaction();
            try{
        $email = Auth::user()->email;
        $qualifications = new Qualification();
        $qualifications->email=$email ;
        $qualifications->company = $request->company;
        $qualifications->designation = $request->designation;
        $qualifications->from=$request->from ;
        $qualifications->to = $request->to;
        $qualifications->image = $request->image;
        $qualifications->degree = $request->degree;
        $qualifications->year = $request->year;
        $qualifications->score=$request->score ;
        $qualifications->mdegree = $request->mdegree;
        $qualifications->myear = $request->myear;
        $qualifications->mscore=$request->mscore ;
        
        // Save the contact record in the database
        $qualifications->save();
       
        DB::commit(); // Commit the transaction after successful save
Toastr::success('updated record successfully :)', 'Success');

return redirect()->route('home');
    }catch(\Exception $e){
        DB::rollback();
        Toastr::error('updated record fail :)','Error');
        return redirect()->back();
    }
       
    }
    // Add Contact 
    public function Contact(Request $request)
    { 
        DB::beginTransaction();
        try {    
        $email = Auth::user()->email;

        $contacts = new Address();
        $contacts->email=$email;
        $contacts->street = $request->street;
        $contacts->city = $request->city;
        $contacts->code=$request->code ;
        $contacts->state = $request->state;
        $contacts->tstreet = $request->tstreet;
        $contacts->tcity = $request->tcity;
        $contacts->tcode=$request->tcode ;
        $contacts->tstate = $request->tstate;
      
        // Save the contact record in the database
        $contacts->save();
       DB::commit(); // Commit the transaction after successful save
        Toastr::success('updated record successfully :)', 'Success');
           return redirect()->route('home');
        } catch (\Exception $e) {
            Toastr::error('Updated record failed :(', 'Error');
            return redirect()->back();
        }
       
    }

//check in value

public function Checkin(Request $request)
{ 
   DB::beginTransaction();
            $email = Auth::user()->email;
            $currentDate = Carbon::now()->toDateString();
              $existingData = Checkin::where('email', $email)
                ->whereDate('created_at', $currentDate)
                ->first();
                    try{
                        if ($existingData && $existingData->created_at->toDateString() == $currentDate) {
                            Toastr::error('Your are already checkin');
                            return redirect()->back();
                        } else {
                         
            $checkin = new Checkin();
            $checkin->email=$email;
            $checkin->checkin = $request->checkin;
            $checkin->save();
                        }
            DB::commit(); // Commit the transaction after successful save
            Toastr::success('updated record successfully :)', 'Success');
               return redirect()->route('home');
            } 
        catch (\Exception $e) {
                Toastr::error('Updated record failed :(', 'Error');
                return redirect()->back();
            }
        }

public function Checkout(Request $request)
{ 
   
    $email = Auth::user()->email;
$currentDate = Carbon::now()->toDateString();
  $existingData = Checkout::where('email', $email)
    ->whereDate('created_at', $currentDate)
    ->first();

    DB::beginTransaction();
        try{
            if ($existingData && $existingData->created_at->toDateString() == $currentDate) {
                Toastr::error('Your are already checkout');
                return redirect()->back();
            } else {
             
            if ($request->total >=240 && $request->total <=300) {
                $checkout = new Checkout();
                $checkout->email = $email;
                $checkout->halfday = 1;
                $checkout->checkout = $request->checkout;
                
                $checkout->save();
            } elseif ($request->total >=420 && $request->total<540) {
                $checkout = new Checkout();
                $checkout->email = $email;
                $checkout->shortleave = 1;
                $checkout->checkout = $request->checkout;
                
                $checkout->save();
            } elseif ($request->total >=60 && $request->total <=240) {
               
                $checkout = new Checkout();
                $checkout->email = $email;
                $checkout->overtime = $request->total;
                $checkout->checkout = $request->checkout;
               
                $checkout->save();
            } 
            elseif ($request->total >=300 && $request->total <=420) {
                $checkouts= $request->total - 300;
               
                $checkouttime=($checkouts / 60);
                $checkout = new Checkout();
                $checkout->email = $email;
                $checkout->halfday = 1;
                $checkout->overtime = $checkouttime; // Overtime is calculated from 5-7 hours
                $checkout->checkout = $request->checkout;
                $checkout->save();
            }
             elseif ($request->total>= 540) {
               
                $checkouts= $request->total - 540;
               
                $checkouttime=($checkouts / 60);
                
                $checkout = new Checkout();
                $checkout->email = $email;
              
               $checkout->overtime=$checkouttime;
               
                $checkout->checkout = $request->checkout;
              
                $checkout->save();
            }
        
DB::commit(); // Commit the transaction after successful save
Toastr::success('updated record successfully :)', 'Success');
   return redirect()->route('home');
        }
        }
    
catch (\Exception $e) {
                Toastr::error('Updated record failed :(', 'Error');
                return redirect()->back();
            }
}
}