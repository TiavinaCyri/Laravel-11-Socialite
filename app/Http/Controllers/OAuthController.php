<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function githubRedirect() {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback() {
        $github_user = Socialite::driver('github')->user();

        $user = [
            'name' => $github_user->getNickname(),
            'email' => $github_user->getEmail(),
            'token' => $github_user->token,
            'avatar' => $github_user->getAvatar(),
        ];

        return $user;
    }
}
