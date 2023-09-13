<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        

            $userGoogleId=User::where('google_id',$googleUser->id)->first();

            if(!$userGoogleId){
            $user = new User ;

            $user->name=$googleUser->name;
            $user->email=$googleUser->email;
            $user->password= Hash::make(Str::random(50));
            $user->google_id=$googleUser->id;
            $user->google_token=$googleUser->token;
            $user->google_refresh_token=$googleUser->refreshToken;

            $user->save();

            Auth::login($user);

            }else {
                
                Auth::login($userGoogleId);
   

            }
   
	        return redirect('/');
    
    }
}
