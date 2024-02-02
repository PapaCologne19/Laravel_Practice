<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListOfTraining extends Model
{
    use HasFactory;
    protected $table = "list_of_training";
    protected $fillable = [
        'training_title', 
        'datetime', 
        'venue', 
        'facilitator', 
        'division',
    ];
}
