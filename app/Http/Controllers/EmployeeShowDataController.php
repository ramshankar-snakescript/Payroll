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
use App\Models\Qualifaction;
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
        if($contact != 0){

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
    // Add Qualifications
    public function Qualifications(Request $request)
    
        { DB::beginTransaction();
            try{
        $email = Auth::user()->email;
        $qualifications = new Qualification();
        $qualifications->email=$email ;
        $qualifications->degree = $request->degree;
        $qualifications->year = $request->year;
        $qualifications->score=$request->score ;
        $qualifications->mdegree = $request->mdegree;
        $qualifications->myear = $request->myear;
        $qualifications->mscore=$request->mscore ;
        // Save the contact record in the database
        $qualifications->save();
       

          
        return redirect()->route('home');
    }catch(\Exception $e){
        DB::rollback();
        Toastr::error('updated record fail :)','Error');
        return redirect()->back();
    }
       
    }
    // Add Contact 
    public function Contact(Request $request)
    
        { DB::beginTransaction();
            try{
        $email = Auth::user()->email;
        $contacts = new Address();
        $contacts->email=$email ;
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
       

          
        return redirect()->route('home');
    }catch(\Exception $e){
        DB::rollback();
        Toastr::error('updated record fail :)','Error');
        return redirect()->back();
    }
       
    }
}
