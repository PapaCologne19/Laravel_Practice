<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm(){
        return view('register');
    }

    public function register(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect(route('showLoginForm'));
    }
}
