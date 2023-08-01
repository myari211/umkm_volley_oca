<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Ramsey\Uuid\Uuid;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
        $userFormGoogle = Socialite::driver('google')->user();
        
        $googleEmail = $userFormGoogle->getEmail();
        $googleName = $userFormGoogle->getName();
        $googleId = $userFormGoogle->getId();

        $checkExistingUsers = $this->checkExistingUsers($googleEmail);

        if($checkExistingUsers == true) {
            return $this->checkGoogleId($googleEmail, $googleId);
        }
        else
        {
            return $this->createUsers($googleName, $googleEmail, $googleId);
        }
    }



    public function checkExistingUsers($email) {
        $user = DB::table('users')
            ->where('email', $email)
            ->count();

        $return = $user > 0 ? true : false;

        return $return;
    }

    public function createUsers($name, $email, $id) {
        $explode = explode($name, " ");
        $total_explode = count($explode);

        $first_name = $explode[0];
        $last_name = $total_explode > 1 ? $explode[1] : NULL; 
        
        

        $createUsers = User::create([
            "id" => Uuid::uuid4()->toString(),
            "first_name" => $first_name,
            "last_name" => $last_name, 
            "google_id" => $id,
            "email" => $email,
            "password" => bcrypt($email),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        $createUsers->assignRole('user');

        if(!$createUsers) {
            return response()->json([
                "Gagal Membuat Users",
            ]);
        }
        else
        {
            return $this->loginUsers($email);
        }
    }

    public function checkGoogleId($googleEmail, $googleId) {
        $checkGoogleId = "";
        $user = DB::table('users')
            ->where(function($query) use ($googleEmail) {
                $query->where('email', $googleEmail);
            })
            ->first();

        $user->google_id === NULL ? $checkGoogleId == false : $checkGoogleId == true;

        if($checkGoogleId == true) {
            return $this->loginUsers($googleEmail);
        }
        else
        {
            return $this->createGoogleIdForUsers($googleEmail, $googleId);
        }
    }

    public function createGoogleIdForUsers($googleEmail, $googleId) {
        $addGoogleId = DB::table('users')
            ->where('email', $googleEmail)
            ->update([
                "google_id" => $googleId,
            ]);

        return $this->loginUsers($googleEmail);
    }

    public function loginUsers($googleEmail) {
        $user = User::find($googleEmail);

        if(isset($user)) {
            Auth::login($user);
            $request->session->regenerate();
        }

        return "Berhasil Login";
    }
}
