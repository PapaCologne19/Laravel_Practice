<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingRequest extends Model
{
    use HasFactory;
    protected $table = "training_request";
    protected $fillable = [
        'user_id',
        'training_title',
        'datetime',
        'venue',
        'facilitator',
        'division',
        'is_approve',
        'is_done',
    ];

}
