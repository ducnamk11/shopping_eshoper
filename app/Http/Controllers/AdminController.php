<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    protected $guardName = 'staff';


    public function index()
    {
        return view('admin.home');
    }

    public function loginAdmin()
    {
        Auth::guard($this->guardName)->logout();
        return view('login');

    }

    public function postLoginAdmin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:2'
        ]);
        if (Auth::guard($this->guardName)->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->to('/admin/home');
        }
        return redirect()->back()->withErrors([  'Password or Email was wrong!']);
    }

    public function postLogout()
    {
        Auth::guard($this->guardName)->logout();
        Session::flush();
        return redirect()->to('/admin');
    }
}
