<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $remember = $request->has('remember');

        if(auth()->attempt($data, $remember)){
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
