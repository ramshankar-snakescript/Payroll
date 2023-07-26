<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Employee;

// Other code in the mail class...

class EmployeeAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;
    public $password;

    public function __construct(Employee $employee, $password)
    {
        $this->employee = $employee;
        $this->password = $password;
    }
    public function build()
    {
        return $this->subject('Welcome to Our Company')
            ->markdown('text.added', [
                'employee' => $this->employee,
            ]);
    }
    // Other methods in the mail class...
}

