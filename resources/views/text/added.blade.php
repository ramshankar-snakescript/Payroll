<p>Hi, {{ $employee->name }}<br>Hope you are doing well.</p>
<?php  $date = $employee->dos; $newDate = date('F', strtotime($date));?>
<p> Please find below attached Email Address:-{{ $employee->email }}<br>
    Password :-{{$employee->password }}</p>
<p>login your profile</p>
<a href =https://dev.snakescript.com/public/user>login</a>
<p>Thank You<br> Risha Ranaut<br> HR Manager</p>
