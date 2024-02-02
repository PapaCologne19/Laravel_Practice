<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class HomeController extends Controller
{
    public function index(){
        return Inertia::render('Home');
    }

    public function showLoginForm(){
        return Inertia::render('Login');
    }

    public function showRegisterForm(){
        return Inertia::render('Register');
    }

    public function registerAccount(UserRequest $request){

    }
}
