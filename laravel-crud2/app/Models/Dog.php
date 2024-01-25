<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;
    protected $table = "dogs";
    protected $fillable = [
        'dog_name',
        'age',
        'gender',
        'color',
        'breed'
    ];
}
