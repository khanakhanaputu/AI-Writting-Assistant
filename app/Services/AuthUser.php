<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Socialite;

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

        return back()->withErrors(['msg' => 'Username dan Password salah']);
    }

    public function googleLogin()
    {
        /** @var AbstractProvider $provider */
        $provider = Socialite::driver('google');

        $googleUser = $provider->stateless()->user();
        $user = User::where('g_id', $googleUser->id)->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'g_id' => $googleUser->id,
                'password' => bcrypt(str()->random(16)),
            ]);
        }

        Auth::login($user);
        return redirect(route('ai.get'));
    }
}
