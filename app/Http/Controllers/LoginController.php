<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginproses(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ], [
            'email.required' => 'Masukkan email yang benar',
            'email.exists'  => 'Email salah',
            'password.required' => 'Password harus diisi',
            'password.exists' => 'Password salah',
        ]);



        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->role === 'Super Admin') {
                return redirect('/');
            } elseif ($user->role === 'Petugas') {
                return redirect('/');
            }
        } else {
            return redirect()->back()->with('danger', 'password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function registerindex()
    {
        $data = user::all();
        return view('register.register', compact('data'));
    }

    public function addregister()
    {
        return view('register.addregister');
    }

    public function insertregister(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:150',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5|max:50',
            'role' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'name.unique' => ' Nama sudah dipakai',
            'email.unique' => 'Email sudah dipakai',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Sandi harus diisi',
            'role.required' => 'role harus diisi',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
            'role' => $request->role,
        ]);

        return redirect('registerindex')->with('success', 'Berhasil Terdaftar');

    }
}
