<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginview()
    {
        if (auth()->user() == true) {
            return redirect()->route('home');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $log = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );

        if (Auth::attempt($log)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.produk')->with('status', 'Selamat datang : ' . $user->name);
            } else {
                return redirect()->route('home')->with('status', 'Selamat datang : ' . $user->name);
            }
        }

        return back()->with('status', 'Email atau Password salah');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login.view');
    }

    public function registerview()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $reg = $request->validate(
            [
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
            ]
        );

        User::create(
            [
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => 'customer'
            ]
        );

        return redirect()->route('login.view')->with('status', 'Berhasl Registrasi');
    }
}
