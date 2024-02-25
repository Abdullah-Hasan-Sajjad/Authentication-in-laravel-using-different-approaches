<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminAuthController extends Controller
{
    public function login() : View {
        return view('auth.super-admin-login');  
    }

    public function loginSubmit(Request $request){
        
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
        
        if(Auth::guard('superAdmin')->attempt($data)){
            return redirect()->route('superAdminDashboardShow')->with('success', 'Login Successful');
        }
        else{
            return redirect()->route('superAdminLogin')->with('error', 'Invalid Credentials');
        }
    }

    public function superAdminLogout(){
        Auth::guard('superAdmin')->logout();
        return redirect()->route('superAdminLogin')->with('success', 'Logout successful');
    }
}
