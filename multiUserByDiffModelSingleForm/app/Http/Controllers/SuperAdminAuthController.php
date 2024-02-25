<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminAuthController extends Controller
{
    public function superAdminLogout(){
        Auth::guard('superAdmin')->logout();
        return redirect()->route('login')->with('success', 'Logout successful');
    }

}
