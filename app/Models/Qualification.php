<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'degree',
        'gender',
        'year',
        'score',
        'mdegree',
        'myear',
        'mscore',
        'timing_sheets',
    ];
}
