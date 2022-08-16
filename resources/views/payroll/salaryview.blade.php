
@extends('layouts.exportmaster')
@section('content')
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
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white">CSV</button>
                            <button class="btn btn-white"><a href=""@click.prevent="printme" target="_blank">PDF</a></button>
                            <button class="btn btn-white"><i class="fa fa-print fa-lg"></i><a href="" @click.prevent="printme" target="_blank"> Print</a></button>
                        </div>
                    </div>
                </div>

            <div class="row" style="width:100%;">
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
                                                    $a =  (int)$users->basic;
                                                    $b =  (int)$users->hra;

                                                    $e =  (int)$users->allowance;
                                                    $Total_Earnings   = $a + $b  + $e;
                                                ?>
                                                <tr>
                                                    <td><strong>Basic Salary</strong> <span class="float-right">{{ $users->basic }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>House Rent Allowance (H.R.A.)</strong> <span class="float-right">{{ $users->hra }}</span></td>
                                                </tr>

                                                <tr>
                                                    <td><strong>Other Allowance</strong> <span class="float-right">{{ $users->allowance }}</span></td>
                                                </tr>
                                                <tr >
                                                    <td rowspan="2"><strong>Total Earnings</strong> <span class="float-right"><strong> <?php echo $Total_Earnings ?></strong></span></td>
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
                                                    $daysinmoth =  Carbon\Carbon::now()->daysInMonth;
                                                    $l = (int)$users->basic/$daysinmoth;


                                                    $l_d = (int)$l * $users->leave;
                                                    $a =  (int)$users->tds;
                                                    $c =  (int)$users->esi;
                                                    $e =  (int)$users->labour_welfare;
                                                    $Total_Deductions   = $a + $c + $e + $l_d;
                                                ?>
                                                <tr>
                                                    <td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">{{ $users->tds }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Leaves</strong> x {{ $users->leave }} <span class="float-right">{{ $l_d }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>ESI</strong> <span class="float-right">{{ $users->esi }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Home Loan</strong> <span class="float-right">{{ $users->labour_welfare }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Deductions</strong> <span class="float-right"><strong><?php echo $Total_Deductions;?></strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12" >
                                    <p><strong>Net Salary:
                                        {{-- ${{ $users->salary }} --}}
                                        {{$Total_Earnings - $Total_Deductions}}
                                    </strong> @php
                                        $number = $Total_Earnings - $Total_Deductions;
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
    "." . $words[$point / 10] . " " .
          $words[$point = $point % 10] : '';
//   echo "(".$result . "Rupees  " . $points . " Paise)";
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
