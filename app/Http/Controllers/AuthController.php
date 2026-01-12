<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthUser;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $auth;
    public function __construct()
    {
        $this->auth = new AuthUser();
    }
    public function register()
    {
        return view('user.register');
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
        return view('user.login');
    }
}
