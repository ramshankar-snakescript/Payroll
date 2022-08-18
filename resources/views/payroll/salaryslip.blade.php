<!doctype html>
<html lang="en">
  <head>
    <style>
table td th {
    border:1px solid;
}
        </style>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            td{
                padding:10px 20px;
            }
        </style>
        </head>
  <body style="background: #f7f7f7;">

    <table align="center" style="width:90%;border :1px solid #ededed;margin-top:20px;background:#fff;">
        <tr>
            <td colspan="2" align="center" style="text-decoration:underline;padding-top:20px;">
                <h4 class="payslip-title">Payslip for the month of {{ \Carbon\Carbon::now()->format('M') }}   {{ \Carbon\Carbon::now()->year }}  </h4>
            </td>
        </tr>
        <tr>
            <td colspan="2">
        <table style="border:none;width:100%;">
            <tr>
                <td>
                    {{-- @if(!empty($users->image))
                    <img src="{{ URL::to('/storage/uploads/'. $users->image) }}" style="width:15%;" class="inv-logo" alt="{{ $users->name }}">
                    @endif --}}

                    <ul class="list-unstyled" style="list-style:none;">
                        <li><h3 class="mb-0">{{ $users->naam }}</h3></li>
                        <li><span>{{ $users->designation }}</span></li>
                        <li>Employee ID: {{ $users->employee_id }}</li>
                        <li>Joining Date: {{ $users->doj }}</li>
                    </ul>
                </td>
                <td style="text-align:right;">
                    <h3 class="text-uppercase">Payslip #{{$users->id}}</h3>
                    <ul class="list-unstyled" style="list-style:none;">
                        <li>Salary Month: <span>{{ \Carbon\Carbon::now()->format('M') }}, {{ \Carbon\Carbon::now()->year }}  </span></li>
                    </ul>
                </td>
            </tr>
        </table>
            </td>
            </tr>
        <tr>
            <td>
                <h3><strong>Earnings </h3>
            </td>
            <td>
                <h3><strong>Deductions </h3>
            </td>
        </tr>
            <tr>
                <td>
                    <table style="width:100%;border:1px solid #dee2e6;">
                        <?php
                        $netsalary = $users->salary;
                        $daysinmoth =  (int)22;
                        $perday = (int)$users->salary/$daysinmoth;

                        if($users->leave == 0){
                            $l =  (int)$users->basic + $perday;
                        }else{
                            $l = (int)0;
                        }

                        $a =  (int)$users->basic;
                        $b =  (int)$users->hra;
                        $e =  (int)$users->allowance;
                        $Total_Earnings   = round($a + $b  + $e +$l);
                    ?>
                        <tr style="border-bottom:1px solid #dee2e6;">
                            <td>Basic Salary</td>
                            <td> <span style="float:right">{{ $users->basic }}</span></td>
                        </tr>
                        <tr style="border-bottom:1px solid #dee2e6;">
                            <td>H.R.A.</td>
                            <td> <span style="float:right">{{ $users->hra }}</span></td>
                        </tr>
                        <tr style="border-bottom:1px solid #dee2e6;">
                            <td style="">Telephone & Internet Allowance</td>
                            <td> <span style="float:right">{{ $users->hra }}</span></td>
                        </tr>
                        <tr style="border-bottom:1px solid #dee2e6;">
                            <td>Other Allowance</td>
                            <td> <span style="float:right">{{ $users->allowance }}</span></td>
                        </tr>
                        <tr >
                            <td >Total Earnings</td>
                            <td> <span style="float:right"> <?php echo $Total_Earnings;  ?></span></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table style="width:100%;border:1px solid #dee2e6;">
                        <?php


                                                    if($users->leave != 0){
                                                        $leaves = (int)$users->leave-1;
                                                        $l_d = (int)$perday * $leaves;

                                                    }else{
                                                        $l_d = (int)0;
                                                    }


                                                    $a =  (int)$users->tds;
                                                    $c =  (int)$users->esi;
                                                    $e =  (int)$users->labour_welfare;
                                                    $Total_Deductions   = $a + $c + $e + $l_d;
                                                ?>
                        <tr style="border-bottom:1px solid #dee2e6;">
                            <td>Tax Deducted at Source (T.D.S.)</td>
                            <td> <span class="float-right">{{ $users->tds }}</span></td>
                        </tr>
                        <tr style="border-bottom:1px solid #dee2e6;">
                            <td>Leaves x {{ $users->leave }}</td>
                            <td> <span class="float-right">{{ $l_d }}</span></td>
                        </tr>

                        <tr style="border-bottom:1px solid #dee2e6;">
                            <td>ESI</td>
                            <td> <span class="float-right">{{ $users->esi }}</span></td>
                        </tr>
                        <tr style="border-bottom:1px solid #dee2e6;">
                            <td>Home Loan</td>
                            <td> <span class="float-right">{{ $users->labour_welfare }}</span></td>
                        </tr>
                        <tr >
                            <td>Total Deductions</td>
                            <td> <span class="float-right"><?php echo $Total_Deductions;?></span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top:20px;">
                    <p>Net Salary: {{-- ${{ $users->salary }} --}}{{$Total_Earnings - $Total_Deductions}}

                     @php

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
"" . $words[$point / 10] . " " .
$words[$point = $point % 10] : '';
// echo "(".$result . "Rupees  and" . $points . " Paise)";
  echo "(".$result . "Rupees )";

                    @endphp
                    </p>

                </td>
            </tr>
        </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
