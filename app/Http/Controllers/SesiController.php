<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SesiController extends Controller
{
    function index() 
    {
        return view('login-page');
    }

    function register() 
    {
        return view('register');
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
                return redirect('/admin')->with('success', 'berhasil login sebagai admin');
            } elseif ($user->role === 'approver') {
                return redirect('/approver')->with('success', 'berhasil login sebagai approver');
            }
        }
        return back()->with(['error', 'Email atau password salah']);
    }

    public function logout() {
        Auth::logout();
        return redirect('/login') -> with('success', 'berhasil logout');
    }
}
