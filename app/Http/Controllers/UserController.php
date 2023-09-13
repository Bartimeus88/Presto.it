<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function profile () {

        $user_announcements = User::find(auth()->user()->id);



        return view ('user.profile',['announcements' => $user_announcements->announcements]);
    }

    // Rotta per il recupero password
    public function forgotPassword()
    {
        
        return view('auth.forgot-password');
        
    }

    //rotta google redirect 
    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }

    //rotta google callback
    public function googleCallback() {

        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
            Auth::login($user);
   
	        return redirect('/');
    

    }
}
