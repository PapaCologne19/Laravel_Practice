<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $table = "cat";
    protected $fillable = [
        'cat_name',
        'age',
        'gender',
        'color',
        'breed'
    ];
}
