<!DOCTYPE html>
<html>

<head>
    <title>Pay Slip</title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .logo_header {
            text-align: center;
        }

        .logo_header h2 {
            font-size: 36px;
            font-weight: 600;
            margin: 0px;
            padding-top: 10px;
        }

        .cmpny-address {
            padding-top: 20px;
        }

        .cmpny-address p {
            margin: 5px;
            font-family: sans-serif;
        }

        .cmpny-address p span {
            font-weight: 600;
            padding-right: 6px;
        }

        .employee_detail {
            width: 80%;
            margin: 0 auto;
            padding-top: 50px;
            font-family: sans-serif;
        }

        .hr_line {
            width: 140px;
            height: 1px;
            background: #333;
            display: block;
            position: relative;
            top: 13px;
            left: 8px;
        }

        .employee_detail p {
            display: flex;
            position: relative;
        }

        .employee_detail th {
            border: 1px solid #333;
            text-align: left;
            padding: 8px;
            background: #dee4fe;
        }

        .employee_detail td {
            border: 1px solid #333;
            text-align: left;
            padding: 8px;
        }

        .employee_detail table {
            width: 100%;
        }

        @media screen and (max-width: 768px) {
            .employee_detail {
                width: 100%;
            }

            .main_table {
                overflow-x: scroll;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
    <script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
</head>

<body>
    {!! Toastr::message() !!}
    <?php
    
    $d =$users->working_day;
    $netsalary = $users->salary;

    
    $date = $users->dos;
    $monthName = date('F', strtotime($date)); // Get the full month name
    $year = date('Y', strtotime($date)); // Get the year

    $perday =  $users->salary / $d;
    $perhours= $perday/8;
    $extra_hours=$users->extra_hours;
    $extra= $perhours* ($extra_hours/60);
    $paid_leave_sal = $perday * 1;

    $days_worked = $users->working_day - (float) $users->leave;
    $other_allowance = $users->telephone_internet;
    $work_in_holidays = $users->work_in_holidays_days;
    
    $wfh =  $users->wfh;
    $wfh_salary = ($wfh* $perday)/ 2;
    
    $halfday=$users->half_day;
    if ($users->wfh) {
        $work_from_office = $days_worked - $users->wfh;
    } else {
        $work_from_office = $days_worked;
    }
//leave
$shortleave =$users->short_leave;
if($shortleave >= 2){
    $shortleave = $shortleave - 2;
    $short_sal = ($shortleave*$perhours);
}
else{
    $short_sal=$shortleave;
}

$halfday =$users->half_day;
$half_sal=$halfday*$perhours;
$lev=$users->leave+$wfh;

    if ($lev > 1) {
                    $leaves = (float) $lev - 1;
                    $l_d = $perday * $leaves+$short_sal+$half_sal;
                   
                     $work_from_office = $work_from_office - $leaves;
                    
                } else {
                    $leaves = (int) 0;
                    $l_d = $perday *$leaves+$short_sal+$half_sal;
                }
     //bonus
     $bonus=$users->bonus;

//overtimeSalary

$overtime= $work_in_holidays * $perday;
$overtime_hours=$users->work_in_holidays_hours*$perhours;
$overtime_salary=($users->bonus+$overtime+$overtime_hours+$users->telephone_internet+$wfh_salary+$extra);
// if($users->leave==0){
//     $overtime_salary=$overtime_salary+$paid_leave_sal;
// }

   
    $gross_sal = $users->bonus + $users->telephone_internet-$users->tds;

  

     //total salary
     if($lev >= 1){
     $total_earning=($users->basic+$users->hra+$users->conveyance+$overtime_salary);
     }
     else{
        $total_earning=($users->basic+$users->hra+$users->conveyance+$overtime_salary+$perday);
     }
     $total_deductions= ($users->pf+$users->esi+$users->tds+$l_d);

    // 
    ?>
    
    <div class="row">
        <a href="{{ route('form/salary/page') }}"> <BUTTON
                style="padding:5px;font-weight:600;font-size:16px;background:blue;color:#fff;border-radius:4px;">Go
                Back</BUTTON></a>
    </div>
    <div class="logo_header">
        {{-- <img src="image/full-logo.jpg"> --}}
        <h2>Snakescript Solutions LLP</h2>
        <div class="cmpny-address">

            <p>E-91, Phase-8, Sector 73, Sahibzada Ajit Singh Nagar, Punjab 160062</p>
            <p><span>Phone:</span> +91-9915993566</p>
            <p><span>Website:</span>https://snakescript.com/</p>
            <p><span>Email:</span>official@snakescript.com</p>
        </div>
    </div>
    <div class="employee_detail">
        <!-- <p>Name of Employee <span style="font-weight: 600;"> {{ ' : ' . $users->naam }}</span></p> -->
        <p>Payslip for <span style="font-weight: 600;"> {{ ' : ' . $monthName.'-'.$year }}</span></p>
        <!-- <p>Total working days <span style="font-weight: 600;"> {{ ' : ' . $users->working_day }}</span></p> -->
        <div class="main_table">
            <table cellpadding="0" cellspacing="0">
                <!-- <tr>
                    <th colspan="4" style="font-size:17px;">Scale of Payment:</th>
                </tr>
                <tr>
                    <td style="font-weight: 700; text-align: center;">Description</td>
                    <td style="font-weight: 700; text-align: center;">Days</td>
                    <td style="font-weight: 700; text-align: center;">Description</td>
                    <td style="font-weight: 700; text-align: center;">Amount($)</td>
                </tr>
                <tr>
                    <td>Standard Working Days in a Month</td>
                    <td style="text-align: center;"> {{ number_format($users->working_day) }} </td>
                    <td>Basic Pay for Month</td>
                    <td style="text-align: right;">{{ number_format($users->basic) }}</td>
                </tr>
                <tr>
                    <td>Work From Office</td>
                    <td style="text-align: center;">{{ number_format($users->working_day) - (float) $users->leave - (int) $users->wfh}}   </td>
                    <td>Work From Home</td>
                    <td style="text-align: right;">{{ $users->wfh }}</td>

                </tr>


                <tr> -->
                    <td colspan="4" style="background: #dee4fe;font-weight: 600;font-size:17px;">Employee Details</td>
                </tr>
                <tr>
                    <th style="text-align:right;background:#fff;"> Name of Employee </th>
                <td style="text-align: right;"> {{ $users->naam }}</td>
                <th style="text-align:right;background:#fff;"> ID of Employee </th>
                <td style="text-align: right;"> {{ $users->employee_id }}</td>
               
                    <!-- <td style="text-align: right;">{{ number_format($users->basic) }}</td>
                    <td style="text-align:right;">House Rent Allowance</td>
                    <td style="text-align: right;">{{ number_format($users->hra) }}</td>
                   
                   -->
                <tr>
                <th style="text-align:right;background:#fff;"> Department </th>
                <td style="text-align: right;"> {{ $users->department }}</td>
                <th style="text-align:right;background:#fff;"> Designation </th>
                <td style="text-align: right;"> {{ $users->designation }}</td>
                <!-- <td style="text-align:right;">Conveyance</td>
                    <td style="text-align: right;">{{ number_format($users->conveyance) }}</td> -->
                    
                    <!-- <td style="text-align:right;">Work From Home :
                        @if ($users->wfh)
                            {{ $users->wfh . ' days' }}
                        @endif
                    </td> -->
                    <!-- <td style="text-align: right;">{{ $wfh }}</td>
                    <td style="text-align:right;">Working Holidays :
                        @if ($users->work_in_holidays_days)
                            {{ $users->work_in_holidays_days . ' days' }}
                        @endif
                        @if ($users->work_in_holidays_hours && $users->work_in_holidays_days)
                            {{ ' and ' . $users->work_in_holidays_hours . ' hours.' }}
                        @elseif ($users->work_in_holidays_hours)
                            {{ $users->work_in_holidays_hours . ' hours.' }}
                        @else
                            {{ '' }}
                        @endif


                    </td> -->
                   
                    
                </tr>
                <tr>
                <th style="text-align:right;background:#fff;"> Monthly Salary  </th>
                <td style="text-align: right;"> {{number_format( $users->salary) }}</td>
                <th style="text-align:right;background:#fff;"> UAN </th>
                <td style="text-align: right;"> {{ $users->uan }}</td>
            </tr>
                <tr>
                <th style="text-align:right;background:#fff;"> Account No </th>
                <td style="text-align: right;"> {{ $users->account_no }}</td>
                <th style="text-align:right;background:#fff;"> IFSC </th>
                <td style="text-align: right;"> {{ $users->ifsc }}</td>
            </tr>
            </tr>
            <tr>
            <td colspan="4"></td>
            </tr>
                <tr>
                    <th colspan="2" style="background: #dee4fe;font-weight: 600;font-size:17px;text-align:center;">Earnings</th>
                    <th colspan="2" style="background: #dee4fe;font-weight: 600;font-size:17px;text-align:center;">Deductions</th>
                </tr>

                <tr>
                    <th style="text-align:center;background: #fff;">Description</th>
                    <th style="text-align:center;background: #fff;">Amount</th>
                    <th style="text-align:center;background: #fff;">Description</th>
                    <th style="text-align:center;background: #fff;">Amount</th>
                </tr>

             <tr>
                <td style="text-align:center;">Basic Salary</td>
                <td style="text-align: center;">{{ number_format($users->basic) }}</td>
                <?php
                    if($users->pf){
                        echo'
                        <td style="text-align:center;">EPF</td>
                    <td style="text-align: center;">'.number_format($users->pf).'</td>';
                    }
                    else{
                        echo'<td style="text-align: center;">EPF</td>
                        <td style="text-align: center;">NA</td>';
                    }
?>
                
                    
            </tr>     
            <tr>
            <td style="text-align:center;">House Rent Allowance</td>
                    <td style="text-align: center;">{{ number_format($users->hra) }}</td>
                    
                    
                    <?php
                    if($users->esi){
                        echo'
                        <td style="text-align:center;">ESI</td>
                    <td style="text-align: center;">'.number_format($users->esi).'</td>';
                    }
                    else{
                        echo' <td style="text-align:center;">ESI</td>
                        <td style="text-align: center;">NA</td>';
                    }
?>

                    
                </tr>
                <tr>
                <td style="text-align:center;">Conveyance</td>
                    <td style="text-align: center;">{{ number_format($users->conveyance) }}</td> 
                
                    <?php
                    if($l_d){
                        echo'
                        <td style="text-align:center;">Unpaid leave </td>
                    <td style="text-align: center;">'.number_format($l_d).'</td>';
                    }
                    else{
                        echo' <td style="text-align:center;">Unpaid leave </td>
                        <td style="text-align: center;">NA</td>';
                    }
?>

                    <!-- <td>Total paid leaves</td>
                    <td style="text-align: center;"> 1 </td>
                    <td>Salary for all paid leaves</td>
                    <td style="text-align: right;"><?php echo $paid_leave_sal; ?></td> -->
                </tr>
                <tr>
                    <td style="text-align: center;">Overtime</td>
                    <?php
                    if($users->leave==0){
                       
                   echo '<td style="text-align: center;">'.round( $overtime_salary+ $paid_leave_sal,2). '</td>';
                    }
                   elseif($overtime_salary){
                    echo'<td style="text-align: center;">'. round($overtime_salary,2).'</td>';
                   }
                    else{
                    echo'<td style="text-align: center;">NA</td>';
                    }
                    ?>
                    <?php
                    if($users->tds){
                        echo'
                    <td style="text-align: center;">TDS</td>
                    <td style="text-align: center;">'.($users->tds).'</td>';
                    }
                    else{
                        echo'<td style="text-align: center;">TDS</td>
                        <td style="text-align: center;">NA</td>';
                    }
?>
            </tr> 
            <tr>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            </tr>
            <tr>
                    <th style="text-align: center;">Total Earnings</th>
                

       
     <td style="text-align: center;">{{ number_format($total_earning) }}</td>'
    

                    <?php
                    if( $total_deductions ){
                        echo'
                        <th style="text-align: center;">Total Deductions</th>
                    <td style="text-align: center;">'.round( $total_deductions, 2 ).'</td>';
                    }
                    else{
                        echo' <th style="text-align: center;">Total Deductions</th>
                        <td style="text-align: center;">NA</td>';
                    }
                   ?>

            </tr> 
            <tr>
            <td colspan="4"></td>
            </tr>
            <tr>
                    <th colspan="3" style="background: #dee4fe;font-weight: 600;font-size:17px;text-align:right;">Net Salary</th>
              
                 <?php $net= $total_earning - $total_deductions;?>
                     <td colspan="1" style="text-align:center;">{{ number_format($net) }} </td>
                    
                   
                   
                   

                </tr> 
           
            </table>

        </div>
    </div>
    <div class="text2" style="text-align:center;">
     <p> (This is a computer generated slip and does not require signature.)</p>
    </div>
    <!-- <span class="text2" style="text-align:center;" >(This is a computer generated slip and does not require signature.)<span> -->

</body>

</html>
