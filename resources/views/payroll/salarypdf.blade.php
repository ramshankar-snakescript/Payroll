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
  	.logo_header{
  		text-align: center;
  	}
  	.logo_header h2{
  		font-size: 36px
  		font-weight: 600;
    	margin: 0px;
    	padding-top: 5px;
  	}
  	.cmpny-address {
    	padding-top: 10px;
	}
	.cmpny-address p {
   		margin: 5px;
   		font-family: sans-serif;
	}
	.cmpny-address p span{
		font-weight: 600;
        padding-right: 6px;
	}
	.employee_detail{
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
	.employee_detail p{
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
</head>
<body>
    <?php
         $start = Carbon\Carbon::now()->startOfMonth();
                         $end = Carbon\Carbon::now()->endOfMonth();
                        // echo Carbon\Carbon::parse($month)->startOfMonth();
                            $dates = [];
                            while ($start->lte($end)) {
                                $carbon = Carbon\Carbon::parse($start);
                                if ($carbon->isWeekend() !=true) {
                                    $dates[] = $start->copy()->format('Y-m-d');
                                }
                                $start->addDay();
                            }
                        $d = count($dates);
                        $netsalary = $users->salary;

                        $perday = round((int)$users->salary/$d);
    ?>
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
        <p >Name of Employee <span style="font-weight: 600;"> {{" : ". $users->naam }}</span></p>
		<p>Payslip for <span style="font-weight: 600;"> {{" : ". \Carbon\Carbon::now()->format( ' F, Y') }}</span></p>
<div class="main_table">
<table cellpadding="0" cellspacing="0">
  <tr>
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
    <td style="text-align: center;"> {{$d}} </td>
    <td>Basic Pay for  Month</td>
    <td style="text-align: right;">{{number_format($users->basic)}}</td>
  </tr>
  <?php $days_worked = (int)$d-(float)$users->leave;
   $paid_leave_sal =  (int)$perday*(int)1;


  $other_allowance = $users->telephone_internet;
  $work_in_holidays = $perday * $users->work_in_holidays_days + ($perday/8) * $users->work_in_holidays_hours;
  $wfh = ($perday/2) * $users->wfh;
  $gross_sal =  $days_worked*$perday + $paid_leave_sal + $other_allowance + $work_in_holidays + $wfh;
  ?>
   <tr>
    <td colspan="4" style="background: #dee4fe;font-weight: 600;font-size:17px;">Break Up of Earnings for the Month</td>
  </tr>
  <tr>
    <td  style="text-align:right;">H.R.A(House Rent Allowance)</td>
    <td style="text-align: right;">{{number_format($users->hra)}}</td>
    <td  style="text-align:right;">D.A</td>
    <td style="text-align: right;">{{number_format($users->da)}}</td>
  </tr>

  {{-- <tr>
    <td  style="text-align:right;">Allowance</td>
    <td style="text-align: right;">{{number_format($users->allowance)}}</td>
    <td  style="text-align:right;">Medical Allowance</td>
    <td style="text-align: right;">{{number_format($users->medical_allowance)}}</td>
  </tr> --}}

  <tr>
    <td  style="text-align:right;">Conveyance</td>
    <td style="text-align: right;">{{number_format($users->conveyance)}}</td>
    <td  style="text-align:right;">Other Allowance</td>
    <td style="text-align: right;">{{number_format($users->telephone_internet)}}</td>

  </tr>
  <td  style="text-align:right;">Work From Home :
    @if ($users->wfh)
    {{$users->wfh." days"}}
    @endif
   </td>
<td style="text-align: right;">{{$wfh}}</td>
<td  style="text-align:right;">Working Holidays :
    @if ($users->work_in_holidays_days)
    {{$users->work_in_holidays_days." days"}}
    @endif
@if ($users->work_in_holidays_hours && $users->work_in_holidays_days)
    {{" and ".$users->work_in_holidays_hours." hours."}}
    @elseif ($users->work_in_holidays_hours)
    {{$users->work_in_holidays_hours." hours."}}
    @else
    {{''}}
@endif


</td>
<td style="text-align: right;">{{number_format($work_in_holidays)}}</td>
</tr>
  <tr>
    <td colspan="4" style="background: #dee4fe;font-weight: 600;font-size:17px;">Computation of Gross Salary to be Paid for This Month:</td>
  </tr>
  <tr>
    <td>Days Worked</td>
    <td style="text-align: center;">{{ $days_worked }}</td>
    <td>Salary to be paid on daily basis</td>
    <td style="text-align: right;">{{number_format($perday)}}</td>
  </tr>
  <tr>
    <td>Total paid leaves</td>
    <td style="text-align: center;"> 1 </td>
    <td>Salary for all paid leaves</td>
    <td style="text-align: right;"><?php echo number_format($paid_leave_sal) ?></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>Total of Gross Salary</td>
    <td style="text-align: right;">{{ number_format($gross_sal) }}</td>
  </tr>
  <!---top--->
  <?php


                                                    if($users->leave > 1.25){
                                                        $leaves = (float)$users->leave - (float)1.25;
                                                        $l_d = round((int)$perday * $leaves);

                                                    }else{
                                                        $leaves = (int)0;
                                                        $l_d = (int)0;
                                                    }


                                                    $a =  (int)$users->tds;
                                                    $c =  (int)$users->esi;
                                                    $e =  (int)$users->labour_welfare;
                                                    $pf = (int)$users->pf;
                                                    $Total_Deductions   = $a + $c + $pf + $e ;
                                                ?>
   <tr>
    <td colspan="4" style="background: #dee4fe;font-weight: 600;font-size:17px;">Break Up of Deductions for the Month</td>
  </tr>
  <tr>
    <td style="text-align:left;">Contribution for Provident Fund:<br> Employer contribution(12%) : {{number_format($users->pf/2)}}  <br> Employee contribution(12%) :  {{number_format($users->pf/2)}}</td>
    <td style="text-align: right;">{{number_format($users->pf)}}</td>

    <td style="text-align:left;">Contribution for E.S.I:<br>Employer Contribution(3.75%)<br>  Employee Contribution(0.25%)</td>
    <td style="text-align: right;">{{number_format($users->esi)}}</td>

  </tr>
  <tr>
    <td style="text-align:right;">Home Loan</td>
    <td style="text-align: right;">{{number_format($users->labour_welfare)}}</td>


    <td style="text-align:right;">Unpaid leave</td>
    <td style="text-align: right;">{{$leaves}}</td>


  </tr>
    <td colspan="3" style="text-align:right;">Total Deductions</td>
    <td style="text-align: right;">{{number_format($Total_Deductions)}}</td>
  </tr>
  <tr style="background: #dee4fe;">
    <td colspan="3" style="text-align:right;font-size:17px;font-weight: 600;">Pay Salary</td>
    <td style="text-align: right;font-size:17px;">{{number_format($gross_sal - $Total_Deductions) }}</td>
  </tr>
</table>
</div>
	</div>
</body>
</html>


