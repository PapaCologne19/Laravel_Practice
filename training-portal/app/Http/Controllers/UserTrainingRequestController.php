<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class UserTrainingRequestController extends Controller
{
    public function index(){
        return Inertia::render('User/Main/index');
    }
}
