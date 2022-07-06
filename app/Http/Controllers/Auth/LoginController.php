<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    // login view
    public function login_view()
    {
        $title = 'Login';
        return view('auth.login', compact('title'));
    }

    // login portal
    public function login_portal(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            // if request empty
            'email.required' => 'Email wajib diisi!',
            'password.required' => 'Password wajib diisi!',

            // if request not format email
            'email.email' => 'Masukkan format email yang benar!',
        ]);

        if (Auth::attempt($credential)) {
            if ($request->has('remember')) {
                Cookie::queue('email', $request->email, 1440);
                Cookie::queue('remember', 1440);
            }
            return redirect()->route('dashboard');
        }
        return back()->with('loginError', 'Gagal Login');
    }
}
