<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function githubRedirect() {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback() {
        $user = Socialite::driver('github')->user();
        dd($user->token);
    }
}
