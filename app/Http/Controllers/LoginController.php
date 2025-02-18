<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function submit (Request $request) {
        $data = $request->only('email', 'password');

        if(Auth::Attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('berhasil', 'Login berhasil');
        } else {
            return redirect()->back()->with('gagal','Email atau kata sandi salah');
        }
    }

    public function dashboard()
    {
        return view('dashboard.main');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('berhasil','Berhasil Log Out');
    }
}
