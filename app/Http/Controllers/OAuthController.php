<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Resend\Laravel\Facades\Resend;

class OAuthController extends Controller
{
    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback()
    {
        $github_user = Socialite::driver('github')->user();

        $user = [
            'name' => $github_user->getNickname(),
            'email' => $github_user->getEmail(),
            'token' => $github_user->token,
            'avatar' => $github_user->getAvatar(),
        ];

        Resend::emails()->send([
            'from' => 'Laravel 11 <onboarding@resend.dev>',
            'to' => $user['email'],
            'subject' => 'Welcome to Laravel 11',
            'html' => 'You have successfully logged in with GitHub. Welcome to Laravel 11!',
        ]);

        return json_encode($user, JSON_PRETTY_PRINT);
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
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
