
@extends('layouts.exportmaster')
@section('content')
{!! Toastr::message() !!}
    <!-- Page Wrapper -->
    <div class="">
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid" id="app">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col" style="margin-left: -222px;">
                        <h3 class="page-title">Payslip</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('form/salary/page') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payslip</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        {{-- <div class="btn-group btn-group-sm">
                            <button class="btn btn-white">CSV</button>
                            <button class="btn btn-white"><a href=""@click.prevent="printme" target="_blank">PDF</a></button>
                            <button class="btn btn-white"><i class="fa fa-print fa-lg"></i><a href="" @click.prevent="printme" target="_blank"> Print</a></button>
                        </div> --}}
                        <a  href="{{url('/send_pdf/'.$users->rec_id)}}"><button class ="btn btn-white">Send PDF</button></a>
                    </div>
                </div>

            <div class="row" style="margin-left: -240px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title">Payslip for the month of {{ \Carbon\Carbon::now()->format('M') }}   {{ \Carbon\Carbon::now()->year }}  </h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    @if(!empty($users->image))
                                    <img src="{{ URL::to('/storage/uploads/'. $users->image) }}" class="inv-logo" alt="{{ $users->name }}">
                                    @endif

                                    <ul class="list-unstyled mb-0">
                                        {{-- <li>{{ $users->name }}</li> --}}
                                        {{-- <li>{{ $users->address }}</li>
                                        <li>{{ $users->country }}</li> --}}
                                    </ul>
                                </div>

                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">Payslip #{{$users->id}}</h3>
                                        <ul class="list-unstyled">
                                            <li>Salary Month: <span>{{ \Carbon\Carbon::now()->format('M') }}, {{ \Carbon\Carbon::now()->year }}  </span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">
                                        <li><h1 class="mb-0"><strong>{{ $users-> naam }}</strong></h1></li>
                                        <li><span>{{ $users->designation }}</span></li>
                                        <li>Employee ID: {{ $users->employee_id }}</li>
                                        <li>Joining Date: {{ $users->doj }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Earnings</strong> <small>(in rupees)</small></h4>
                                        <table class="table table-bordered">
                                            <tbody>
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
// echo $d;

                                                    $netsalary = $users->salary;
                                                    $daysinmoth =  (int)22;
                                                    $perday = (int)$users->salary/$d;



                                                    $a =  (int)$users->basic;
                                                    $b =  (int)$users->hra;
                                                    $e =  (int)$users->allowance  + (int)$users->conveyance + (int)$users->medical_allowance + (int)$users->da;

                                                    $Earnings   = $a + $b  + $e + (int)$users->telephone_internet;
                                                    $other = (int)$users->salary - (int)$Earnings;

                                                    $Total_Earnings = (int)$Earnings + (int)$other ;







                                                ?>
                                                <tr>
                                                    <td>Basic Salary <span class="float-right">{{ number_format($users->basic) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>House Rent Allowance (H.R.A.) <span class="float-right">{{ number_format($users->hra) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Telephone And Internet <br>Reimbursement <span class="float-right">{{ number_format($users->telephone_internet) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Other Allowance <span class="float-right">{{ number_format((int)$users->allowance + (int)$users->conveyance + (int)$users->medical_allowance + (int)$users->da + (int)$other) }}</span></td>
                                                </tr>
                                                <tr >
                                                    <td rowspan="2"><strong>Total Earnings</strong> <span class="float-right"><strong> <?php echo number_format($Total_Earnings) ?></strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Deductions</strong> <small>(in rupees)</small></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php


                                                    if($users->leave > 1.5){
                                                        $leaves = (float)$users->leave - (float)1.5;
                                                        $l_d = round((int)$perday * $leaves);

                                                    }else{
                                                        $leaves = (int)0;
                                                        $l_d = (int)0;
                                                    }


                                                    $a =  (int)$users->tds;
                                                    $c =  (int)$users->esi;
                                                    $e =  (int)$users->labour_welfare;
                                                    $pf = (int)$users->pf;
                                                    $Total_Deductions   = $a + $c + $pf + $e + $l_d;
                                                ?>
                                                <tr>
                                                    {{-- <td hidden><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">{{ $users->tds }}</span></td> --}}
                                                    <td>Provident Fund (Employee Contribution (12%) : 1800<br>
                                                        Employer Contribution (12%) : 1800) <span class="float-right">{{ number_format($users->pf)}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Unpaid Leaves {{ '('.$leaves.')' }}  <span class="float-right">{{ number_format($l_d) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>ESI <span class="float-right">{{ number_format($users->esi) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Home Loan <span class="float-right">{{ number_format($users->labour_welfare) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Deductions</strong> <span class="float-right"><strong><?php echo number_format($Total_Deductions);?></strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12" >
                                    <p><strong>Pay Salary:
                                        @php
                                         if($users->leave < 1){
                                            $net_salary  =  $Total_Earnings + $perday;
                                                    }else{
                                                        $net_salary = $Total_Earnings;
                                                    }

                                        @endphp
                                        {{-- ${{ $users->salary }} --}}
                                        {{number_format($net_salary - $Total_Deductions)}}
                                    </strong> @php
                                        $number = round($net_salary - $Total_Deductions);
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "" . $words[$point / 10] . " " .
          $words[$point = $point % 10] : '';
//   echo "(".$result . "Rupees  and" . $points . " Paise)";
  echo "(".$result . "Rupees )";
                                    @endphp</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
    </div>
@endsection
