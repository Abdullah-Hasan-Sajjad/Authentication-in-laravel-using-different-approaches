<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    public function login() : View {
        return view('auth.admin-login');  
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
        
        if(Auth::guard('admin')->attempt($data) || Auth::guard('superAdmin')->attempt($data)){
            return redirect()->route('adminDashboardShow')->with('success', 'Login Successful');
        }
        else{
            return redirect()->route('adminLogin')->with('error', 'Invalid Credentials');
        }
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('adminLogin')->with('success', 'Logout successful');
    }

}
