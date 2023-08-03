<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signin()
    {
        return view('auth.signin', [
            'page_active' => 'signin',
        ]);
    }

    public function signup()
    {
        return view('auth.signup', [
            'page_active' => 'signup',
        ]);
    }

    public function signinPost(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $message = [
            'required' => 'tidak boleh kosong!',
            'email' => 'email tidak sesuai!'
        ];

        $credentials = $request->validate($rules, $message);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    public function signupPost(Request $request)
    {
        // request validation
        $rules = ([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $message = [
            'required' => 'tidak boleh kosong!',
            'min' => 'minimal :min karakter!',
            'email' => 'email tidak sesuai!',
            'unique' => ':attribute sudah terdaftar!',
            'min' => 'minimal :min karakter!',
        ];

        $validatedData = $request->validate($rules, $message);

        User::create($validatedData);

        // session()->flash('success', 'Sign up success!');

        return redirect('/signin')->with('success', 'Berhasil mendaftar, silahkan login');
    }

    public function signout()
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('/');
    }
}
