<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class SesiController extends Controller
{
    function index() 
    {
        return view('login-page');
    }

    function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/admin');
            } elseif ($user->role === 'approver') {
                return redirect('/approver');
            }
        }
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    use AuthenticatesUsers;

    protected $redirectTo = '/'; // Default redirect path after login

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect('/admin');
        } elseif ($user->role === 'approval') {
            return redirect('/approval');
        }

        return redirect('/');
    }

    function logout() {
        Auth::logout();
        return redirect();
    }
}
