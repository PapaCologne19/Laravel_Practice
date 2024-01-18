<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $fillable = [
        'employee_name',
        'division',
        'department',
        'company_name',
        'company_address',
    ];
}
