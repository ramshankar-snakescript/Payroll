<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use PDF;
use App\Models\Checkout;
use Auth;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // main dashboard
    public function index()
    {
        $emp = DB::table('employees')->count();
        $dept = DB::table('departments')->count();

        return view('dashboard.dashboard', compact('emp', 'dept'));
    }
    // employee dashboard
    public function emDashboard()
    {
        $dt        = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        return view('dashboard.emdashboard',compact('todayDate'));
    }

    public function generatePDF(Request $request)
    {
        // $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        // $pdf = PDF::loadView('payroll.salaryview', $data);
        // return $pdf->download('text.pdf');
        // selecting PDF view
        $pdf = PDF::loadView('payroll.salaryview');
        // download pdf file
        return $pdf->download('pdfview.pdf');
    }
    public function Checkout(Request $request)
{ 
    
    $email = Auth::user()->email;
    DB::beginTransaction();
        try{
            $checkout = new Checkout();
            $checkout->email=$email;
            $checkout->checkout = $request->checkout;
            $checkout->save();
        
            DB::commit(); // Commit the transaction after successful save
            Toastr::success('updated record successfully :)', 'Success');
               return redirect()->route('home');
            } catch (\Exception $e) {
                Toastr::error('Updated record failed :(', 'Error');
                return redirect()->back();
            }
}

}
