<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffSalary extends Model
{
    protected $table = "staff_salaries";
    use HasFactory;
    protected $fillable = [
        'name',
        'rec_id',
        'salary',
        'basic',
        'da',
        'hra',
        'conveyance',
        'telephone_internet',
        'allowance',
        'medical_allowance',
        'tds',
        'esi',
        'pf',
        'leave',
        // 'prof_tax',
        'labour_welfare',
    ];
}
