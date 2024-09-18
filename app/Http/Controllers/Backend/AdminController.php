<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    //login do admin
    public function login()
    {
        return view('admin/auth/login');
    }

    //recuperar senha
    public function forgot()
    {
        return view('admin/auth/forgot-password');
    }

    //Logout admin
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('admin.login');
    }
}
