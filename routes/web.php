<?php

use App\Http\Controllers\OAuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/auth/redirect', [OAuthController::class, 'githubRedirect']);

Route::get('/auth/callback', [OAuthController::class, 'githubCallback']);
