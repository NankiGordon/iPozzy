<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\User;

class SocialController extends Controller
{
    // Redirect to Google authentication page
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the Google callback
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Check if the user already exists in your database
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // If the user does not exist, create a new user
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(24)),  // Generate a random password
            ]);
        }

        // Log the user in
        Auth::login($user);

        return redirect()->to('/home');  // Redirect to the homepage or dashboard
    }
}
