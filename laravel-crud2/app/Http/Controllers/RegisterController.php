<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $request['password'] = Hash::make($request['password']);
        User::create([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        return redirect(route('showLogin'))->with('success', 'Registration Success.');
    }
}
