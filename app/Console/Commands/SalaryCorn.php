<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\Mail\OrderShipped;
use App\Models\StaffSalary;
use App\Models\Employee;
use Carbon\Carbon;

class SalaryCorn extends Command
{
    protected $signature = 'salary:cron';
    protected $description = 'Send monthly salary slips to employees';

    public function handle()
    {

        // dd('The AutoSalarySlip command is being executed.');

        $currentMonth = date('m');
        $currentYear = date('Y');

        $user = DB::table('employees')
            ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.rec_id')
            ->join('designation', 'employees.desg', '=', 'designation.id')
            ->join('departments', 'employees.dept', '=', 'departments.id')
            ->select('employees.*', 'employees.name as naam', 'staff_salaries.*', 'designation.designation as designation', 'departments.department as department')
            ->whereMonth('staff_salaries.dos', $currentMonth)
            ->whereYear('staff_salaries.dos', $currentYear)
            ->get();
            if ($user) {
                // Update the is_send value to 1
                DB::table('staff_salaries')->update(['is_send' => 1]);
            }
        foreach ( $user as  $users) {
            // Generate and save PDF
            $pdf = PDF::loadView('payroll.salarypdf', compact('users'));
            $date =  $users->dos;
            $newDate = date('F', strtotime($date));
            $name =  $users->naam . '_' . $newDate . '_SalarySlip.pdf';
            Storage::put('public/' . $name, $pdf->output());

            // Send email with the PDF attachment
            Mail::send('text.mail', compact('users'), function ($m) use ( $users, $name) {
                $m->from("jasmeen@snakescript.com", env('Snakescript Solutions LLP'));
                $m->to( $users->email)->subject('Salary Slip')->attach(public_path('storage/' . $name));
            });
        }
    }
}
?>