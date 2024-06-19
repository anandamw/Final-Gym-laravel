<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {

            $role = Auth::user()->role;
            switch ($role) {
                case 'admin':
                    return redirect('/dashboard/admin');
                    break;
                case 'karyawan':
                    return redirect('/dashboard/karyawan');
                    break;
                case 'customer':
                    return redirect('/page');
                    break;
                default:
                    return redirect('/login')->withErrors('Role Tidak Valid')->withInput();
            }
        } else {
            return redirect('/login')->withErrors('Username atau Password Salah')->withInput();
        }
    }

    public function register()
    {
        return view('auth.register');
    }
    public function register_action(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string',
        ]);

        $token = uniqid();

        $user = new User();

        $user->token_users = $token;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password =  bcrypt($request->password);
        $user->role = 'customer';
        $user->save();
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
