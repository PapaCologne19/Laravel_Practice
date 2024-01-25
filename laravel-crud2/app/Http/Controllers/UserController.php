<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function login(UserRequest $request){
        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember');

        if(auth()->attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('welcome'))->with('success', 'Successfully Login');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match to our records.'
        ]);
    }

    public function logout(Request $request){
        Auth::guard()->logout();
        $request->session()->invalidate();

        return redirect('login');
    }
}
