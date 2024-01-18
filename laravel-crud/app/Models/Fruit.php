<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    use HasFactory;
    protected $table = "fruit";
    protected $fillable = [
        'fruit_name', 
        'color',
        'taste',
        'quantity',
        'price'
    ];
}
