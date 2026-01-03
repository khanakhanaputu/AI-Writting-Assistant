<?php

namespace App\Http\Controllers;

use App\Services\AuthUser;
use Laravel\Socialite\Facades\Socialite;

class AuthGoogleController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $auth = new AuthUser();

        return $auth->googleLogin();
    }
}
