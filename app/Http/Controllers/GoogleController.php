<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{


    public function LoginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function CallbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            dd($user);
            return view('home');
        } catch (\Exception $e) {
            // return throw new $e('Something went wrong with Google login');
            return $e;
        }
    }
}
