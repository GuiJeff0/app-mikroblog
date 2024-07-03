<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback(User $user)
    {
        $user = Socialite::driver('google')->user();

        $findUser = User::where('google_id',$user->id)->first();

        if($findUser){
            Auth::login($findUser);
            return redirect()->route('home');
        } else {
            $user = User::updateOrCreate([
                'email' => $user->email,
            ],[
                'name' => $user->name,
                'goole_id' => $user->id,
                'password' => encrypt($user->password),
            ]);
        }
        return redirect()->route('home');
    }
}
