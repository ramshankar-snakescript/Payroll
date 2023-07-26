<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends  Authenticatable
{
    
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'birth_date',
        'gender',
        'employee_id',
        'company',
        'holidays',
        'leaves',
        'clients',
        'projects',
        'tasks',
        'assets',
        'timing_sheets',
    ];
}
