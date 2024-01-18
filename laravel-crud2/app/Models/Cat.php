<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "cat";
    protected $fillable = [
        'cat_name',
        'age',
        'gender',
        'color',
        'breed'
    ];

    public function getRouteKeyName(): string
    {
        return 'id';
    }
}
