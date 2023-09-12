<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
