<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $table = "applicant";
    protected $fillable = [
        'applicant_name', 
        'age',
        'address',
        'email_address',
        'gender',
        'civil_status',
    ];
}
