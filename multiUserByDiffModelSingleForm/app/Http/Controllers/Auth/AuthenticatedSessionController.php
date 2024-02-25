<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function customLogin(Request $request){
        
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
            ]
        );

        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password']
        ];
        
        if(Auth::guard('web')->attempt($data)){
            return redirect()->route('dashboard')->with('success', 'Login Successful');
        }
        elseif(Auth::guard('admin')->attempt($data)){
            return redirect()->route('adminDashboardShow')->with('success', 'Login Successful');
        }
        elseif(Auth::guard('superAdmin')->attempt($data)){
            return redirect()->route('superAdminDashboardShow')->with('success', 'Login Successful');
        }
        else{
            return redirect()->route('login')->with('error', 'Invalid Credentials');
        }
        
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
