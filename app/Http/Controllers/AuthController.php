<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $auth;
    public function __construct()
    {
        $this->auth = new AuthUser();
    }
    public function register()
    {
        return view('pages.user.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8',
            'email' => 'required|string'
        ]);

        if ($validated['password'] !== $validated['confirm_password']) {
            return back()->withErrors('Password not same!');
        }
        return $this->auth->register($validated['name'], $validated['password'], $validated['email']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('register.form'));
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        return $this->auth->login($validated['name'], $validated['password']);
    }

    public function loginForm()
    {
        return view('pages.user.login');
    }

    public function resetPassword(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8'
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            return redirect()->back()->withErrors('Wrong Password My Ni');
        }

        if ($validated['password_confirmation'] !== $validated['password']) {
            return redirect()->back()->withErrors('Password Not Same!');
        }

        User::where('id', $user->id)->update([
            'password' => Hash::make($validated['password'])
        ]);

        return "sukses";
    }
}
