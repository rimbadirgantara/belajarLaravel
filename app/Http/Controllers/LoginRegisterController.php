<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginRegisterController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->level == 'user') {
                return redirect('/user');
            } elseif ($user->level == 'admin') {
                return redirect('/admin');
            }
        }

        return back()->with('failed', 'Maaf, Terjadi Kesalahan !');
    }

    public function postRegister(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'jenisKelamin' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->jenis_kelamin = $request->jenisKelamin;

        if ($user->save()){
            return redirect('/auth/login')->with('success', 'Akun Berhasil Dibuat, Silahkan Login');
        } else {
            return back()->with('failed', 'Maaf, Terjadi Kesalahan, Coba Kembali');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
        }
        
}

