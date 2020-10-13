<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    public function loginAdmin()
    {
      if (auth()->check()){
          return redirect()->route('admin_index');
      }
        return view('login');
    }

    public function postLoginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false ;
       if (auth()->attempt([
           'email' => $request->email,
           'password' => $request->password
       ], $remember)) {
           return redirect()->route('admin_index');
       }else{
           return redirect()->route('login')->with('fail', 'Password or email is incorrect!');

       }
   }
}
