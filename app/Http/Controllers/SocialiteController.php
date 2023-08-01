<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Ramsey\Uuid\Uuid;

class SocialiteController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
        $userFormGoogle = Socialite::driver('google')->user();
        
        return response()->json([
            "data" => $userFormGoogle,
        ]);
    }
}
