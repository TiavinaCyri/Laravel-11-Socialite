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

        return json_encode($user, JSON_PRETTY_PRINT);
    }

    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback() {
        $google_user = Socialite::driver('google')->user();
        $user = [
            'name' => $google_user->getName(),
            'email' => $google_user->getEmail(),
            'token' => $google_user->token,
            'avatar' => $google_user->getAvatar(),
        ];

        return json_encode($user, JSON_PRETTY_PRINT);
    }
}
