<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Socialite;

class SocialAuthGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();
        $authUser = $this->findOrCreateUser($googleUser);

        Auth::login($authUser, true);

        return redirect()->route('trangchu')->with('message','Login susscess , Shopping Now !!!');

    }
    private function findOrCreateUser($googleUser){
        $existUser = User::where('provider_id',$googleUser->id)->first();
        if($existUser){
            return $existUser;
        }

        return User::create([
            'name' => $googleUser->name,
            'password' => $googleUser->token,
            'email' => $googleUser->email,
            'provider_id'=>$googleUser->id,
            'level' => 'user',
            'provider' => $googleUser->id,
        ]);
    } 
}
