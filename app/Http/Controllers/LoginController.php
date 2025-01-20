<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView()
    {
        // Menambahkan pengecekan jika admin sudah login
        if (Auth::guard('web')->check()) {
            return redirect('/');  // Redirect ke halaman utama jika sudah login
        }

        return view('login');
    }

    public function authenticate(Request $request):RedirectResponse
    {
        $credentials=$request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError','Login Failed');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
