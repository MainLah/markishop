<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function show_admin_login_form()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'email'=>$request->email, 
            'password'=>$request->password, 
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->with('error', "Credentials doesn't match!");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login-admin');
    }
}
