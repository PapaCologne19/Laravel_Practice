<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect(route('showLogin'))->with('success', 'Registration Success.');
    }
}
