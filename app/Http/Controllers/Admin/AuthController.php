<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
     // fun to login user
     public function login(Request $request)
     {
         // check method
         if ($request->isMethod('post')) {
             $request->validate([
                 'email' => 'required',
                 'password' => 'required',
             ]);
 
             $credentials = $request->only('email', 'password');
             if (Auth::attempt($credentials)) {
                 $request->session()->regenerate();
 
                 return redirect()->route('dashboard');
             } else {
                 return redirect()->back()->with(
                     'error', 'Invalid credentials.'
                 );
             }
         } else {
             // return
             return view('admin.admin-login');
         }
 
     }
 
     // fun to logout user
     public function logout()
     {
         Auth::logout();
         return redirect()->route('auth_login');
     }
}
