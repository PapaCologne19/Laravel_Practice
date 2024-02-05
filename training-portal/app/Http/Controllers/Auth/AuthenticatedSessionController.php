<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');
        
        if (auth()->attempt($data, $remember)) {
            $user = auth()->user();
            $request->session()->regenerate();

            if (User::isAdmin($user->user_type)) {
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                return redirect()->intended(RouteServiceProvider::MAIN);
            }
        }

        return back()->withErrors([
            'username' => 'The username or password is incorrect',
        ]);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
