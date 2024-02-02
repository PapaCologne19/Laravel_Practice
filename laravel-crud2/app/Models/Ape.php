<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ape extends Model
{
    use HasFactory;
    protected $table = "ape";
    protected $fillable = [
        'ape_name',
        'age',
        'gender',
        'color',
        'type'
    ];
}
