<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bird extends Model
{
    use HasFactory;
    protected $table = "bird";
    protected $fillable = [
        'bird_name',
        'age',
        'gender',
        'color',
        'breed'
    ];
}
