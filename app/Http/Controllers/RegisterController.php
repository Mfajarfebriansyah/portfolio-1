<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view("register.index");
    }

    public function store(Request $request, User $user)
    {
       $validator = Validator::make($request->all(), [
            "username" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:8"
       ], [
            "username.required" => "Username Harus Diisi",
            "email.required" => "Email Harus Diisi",
            "email.email" => "Harus Berformat Email",
            "email.unique" => "Email Sudah Digunakan",
            "password.required" => "Password Harus Diisi",
            "password.min" => "Password Minimal 8"
       ]);

       if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    DB::beginTransaction();
    try {

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

    DB::commit();
    return redirect()->route("login")->with("berhasil", "registrasi berhasil");
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors($e)->withInput();
    }

    }
}
