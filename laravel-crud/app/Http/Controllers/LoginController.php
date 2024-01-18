<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use PhpParser\Node\Stmt\Return_;
use AutheticatesUser;


class LoginController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended($this->redirectTo)->with('success', 'Successfully Login');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logout(Request $request){
        Auth::guard()->logout();
        $request->session()->invalidate();

        return redirect('/login');
    }
}
