<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUser
{
    public function register($username, $password, $email)
    {

        if (User::where('name', $username)->exists() || User::where('email', $email)->exists()) {
            return view('user.register')->with('msg', 'user already exists');
        }
        $user = User::create([
            'name' => $username,
            'password' => Hash::make($password),
            'email' => $email
        ]);

        Auth::login($user);

        return view('user.register')->with('msg', 'success');
    }

    public function login($username, $password)
    {
        if (Auth::attempt(['name' => $username, 'password' => $password])) {
            session()->regenerate();
            return redirect()->intended('/ai');
        }

        return back()->withErrors('msg', 'Username dan Password Salah!');
    }
}
