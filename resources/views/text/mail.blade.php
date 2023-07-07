<p>Hi, {{ $users->naam }}<br>Hope you are doing well.</p>
<?php  $date = $users->dos; $newDate = date('F', strtotime($date));?>
<p> Please find below attached {{ $newDate }} Salary Slip</p>


<p>Thank You<br> Risha Ranaut<br> HR Manager</p>
