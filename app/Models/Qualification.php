<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'company',
        'designation',
        'from',
        'to',
        'image',
        'degree',
        'year',
        'score',
        'mdegree',
        'myear',
        'mscore',
    ];
}
